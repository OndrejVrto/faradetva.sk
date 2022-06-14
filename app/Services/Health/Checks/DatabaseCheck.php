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
            $result->notificationMessage('health-results.database_connection.ok')->ok();
        } catch (Exception $exception) {
            $result->failed("health-results.database_connection.exception");
            $exceptionMessage = $exception->getMessage();
        }

        return $result->meta([
            'connection_name' => $connectionName,
            'exceptionMessage' => $exceptionMessage ?? '',
        ]);
    }

    protected function getDefaultConnectionName(): ?string {
        $valueConnection = Valuestore::make(config('farnost-detva.value_store.config'))
            ->get('config.database.default');

        return is_null($valueConnection) ? config('database.default') : $valueConnection;
    }
}
