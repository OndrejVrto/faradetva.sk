<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class QueryLogService {
    private $file_name = 'query.log';

    private $file_path;

    private $total_query;

    private $total_time;

    private $final;

    public function __construct() {
        if (config('farnost-detva.guery_loging', false) and !Str::startsWith(request()->path(), '_debugbar')) {
            $this->file_path = storage_path("logs\\".$this->file_name);
            $this->total_query = 0;
            $this->total_time = 0;
            $this->final = [];

            File::delete($this->file_path);

            DB::listen(function ($query) {
                // Not cache Query
                if (!Str::startsWith($query->sql, ["insert into `cache`", "update `cache`", "select * from `cache`"])) {
                    $this->total_query++;
                    $this->total_time += $query->time;

                    $this->addQuery(
                        $query,
                        // grab the first element of non vendor calls
                        collect(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))
                            ->filter(function ($trace) {
                                return isset($trace['file']) ? !str_contains($trace['file'], 'vendor') : false;
                            })
                            ->first()
                    );
                }
            });

            app()->terminating(function () {
                $this->final['meta'] = [
                    'Date'          => date('Y-m-d H:i:s'),
                    'URL'           => request()->url(),
                    'Method'        => request()->method(),
                    'Total queries' => $this->total_query,
                    'Total Time'    => $this->total_time . " ms",
                ];

                $this->write();
            });
        }
    }

    private function addQuery($query, $trace) {
        $queryStr = $this->getSqlWithBindings($query);
        $time = $query->time;
        $file = $trace['file'];
        $line = $trace['line'];

        $this->final['queries'][] = [
            '#'          => $this->total_query,
            // 'query'       => $query->sql,
            'Final Query' => $queryStr,
            'Bindings'    => $query->bindings,
            'Time'        => $time . " ms",
            'File'        => $file . ":$line",
            'Line'        => $line
        ];
    }

    private function getSqlWithBindings($query) {
        return vsprintf(str_replace('?', '%s', $query->sql), collect($query->bindings)
            ->map(function ($binding) {
                return is_numeric($binding) ? $binding : "'{$binding}'";
            })->toArray());
    }

    private function write() {
        foreach ($this->final['meta'] as $key => $value) {
            $this->writeLine($this->addSpace($key, 14) . ":  $value");
        }

        $this->writeLine(str_repeat("-", 100) . PHP_EOL);

        if (isset($this->final['queries']) and is_array($this->final['queries'])) {
            foreach ($this->final['queries'] as $q) {
                foreach ($q as $key => $val) {
                    if (is_array($val)) {
                        $this->writeLine($this->addSpace($key, 12) . ":  {" . implode(", ", $val)."}");
                    } else {
                        $this->writeLine($this->addSpace($key, 12) . ":  " . $val);
                    }
                }

                $this->writeLine("");
            }
        }
    }

    private function addSpace($key, $max) {
        return $key . str_repeat(' ', max($max-strlen($key), 0));
    }

    private function writeLine($txt) {
        file_put_contents($this->file_path, $txt . PHP_EOL, FILE_APPEND);
    }
}
