<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Exception;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Support\Facades\DB;

class DatabaseCheck extends Check {
    protected ?string $connectionName = null;

    public function connectionName(string $connectionName): self {
        $this->connectionName = $connectionName;
        return $this;
    }

    public function run(): Result {
        $name = 'health-results.database_connection';
        $this->label("$name.label");

        $connectionName = $this->connectionName ?? config('database.default');

        $result = Result::make();
        try {
            DB::connection($connectionName)->getPdo();
            $result->notificationMessage("$name.ok")->ok();
        } catch (Exception $exception) {
            $result->failed("$name.exception");
            $exceptionMessage = $exception->getMessage();
        }

        return $result->meta([
            'connection_name' => $connectionName,
            'exceptionMessage' => $exceptionMessage ?? '',
        ]);
    }
}
