<?php

namespace App\Services\Health\Checks;

use Exception;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;

class CacheResponseCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.cache_response.label');

        $result = Result::make();

        try {
            $this->enabledCache()
                ? $result->notificationMessage("health-results.cache_response.ok")->ok()
                : $result->warning("health-results.cache_response.failed");
        } catch (Exception $exception) {
            $result->failed("health-results.cache_response.exception");
            $exceptionMessage = $exception->getMessage();
        }

        return $result->meta([
            'driver' => $this->getDriver(),
            'time'   => $this->getTime(),
            'exceptionMessage' => $exceptionMessage ?? '',
        ]);
    }

    protected function enabledCache(): string {
        $cache = Valuestore::make(config('farnost-detva.value_store.config'))
                            ->get('config.responsecache.enabled');

        return is_null($cache) ? config('responsecache.enabled', true) : $cache;
    }

    protected function getDriver(): string {
        $driver = Valuestore::make(config('farnost-detva.value_store.config'))
                        ->get('config.responsecache.cache_store');

        return is_null($driver) ? config('responsecache.cache_store', 'database') : $driver;
    }

    protected function getTime(): string {
        return gmdate("H:i:s", config('responsecache.cache_lifetime_in_seconds'));
    }
}
