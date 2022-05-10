<?php

namespace App\Services\Health\Checks;

use Exception;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\DB;

class DatabaseCheck extends Check
{
    protected ?string $connectionName = null;

    public function connectionName(string $connectionName): self  {
        $this->connectionName = $connectionName;
        return $this;
    }

    public function run(): Result {
        $connectionName = $this->connectionName ?? $this->getDefaultConnectionName();
        $this->label('health-results.database_connection.label');

        $result = Result::make();
        try {
            DB::connection($connectionName)->getPdo();
            $result->ok('health-results.database_connection.ok');
        } catch (Exception $exception) {
            $result->failed("health-results.database_connection.exception");
            $exceptionMessage = $exception->getMessage();
        }

        return $result->meta([
            'connection_name' => $connectionName,
            'exceptionMessage' => $exceptionMessage ?? '',
        ]);
    }

    protected function getDefaultConnectionName(): string {
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('config.database.default')) {
            return $valueStorage->get('config.database.default');
        }

        return config('database.default');
    }
}
