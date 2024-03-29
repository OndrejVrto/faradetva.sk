<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Events\QueryExecuted;

class QueryLogService {
    private string $file_name = 'query.log';

    private string $file_path = '';

    private int $total_query = 0;

    private float $total_time = 0;

    private array $final = [];

    public function __construct() {
        if (config('farnost-detva.guery_loging', false) && !Str::startsWith(request()->path(), '_debugbar')) {
            $this->file_path = storage_path("logs\\".$this->file_name);

            File::delete($this->file_path);

            DB::listen(function ($query): void {
                // Not cache Query
                if (!Str::startsWith($query->sql, ["insert into `cache`", "update `cache`", "select * from `cache`"])) {
                    $this->total_query++;
                    $this->total_time += $query->time;

                    $this->addQuery(
                        $query,
                        $this->grabFirstElementNonvendorCalls()
                    );
                }
            });

            app()->terminating(function (): void {
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

    private function addQuery(QueryExecuted $query, array $trace): void {
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

    private function grabFirstElementNonvendorCalls(): array {
        return head(Arr::where(
            debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS),
            fn ($trace) => isset($trace['file']) && !str_contains((string) $trace['file'], 'vendor')
        ));
    }

    private function getSqlWithBindings(QueryExecuted $query): string {
        return
            vsprintf(
                format: str_replace(
                    search:  '?',
                    replace: '%s',
                    subject: $query->sql
                ),
                values: collect($query->bindings)
                            ->map(
                                fn ($binding) => is_numeric($binding)
                                    ? $binding
                                    : "'{$binding}'"
                            )
                            ->toArray()
            );
    }

    private function write(): void {
        foreach ($this->final['meta'] as $key => $value) {
            $this->writeLineToQueryLogFile($this->addSpace($key, 14) . ":  $value");
        }

        $this->writeLineToQueryLogFile(str_repeat("-", 100) . PHP_EOL);

        if (isset($this->final['queries']) && is_array($this->final['queries'])) {
            foreach ($this->final['queries'] as $q) {
                foreach ($q as $key => $val) {
                    if (is_array($val)) {
                        $this->writeLineToQueryLogFile($this->addSpace($key, 12) . ":  {" . implode(", ", $val)."}");
                    } else {
                        $this->writeLineToQueryLogFile($this->addSpace($key, 12) . ":  " . $val);
                    }
                }

                $this->writeLineToQueryLogFile("");
            }
        }
    }

    private function addSpace(string $key, int $max): string {
        return $key . str_repeat(' ', max($max-strlen($key), 0));
    }

    private function writeLineToQueryLogFile(string $txt): void {
        file_put_contents($this->file_path, $txt . PHP_EOL, FILE_APPEND);
    }
}
