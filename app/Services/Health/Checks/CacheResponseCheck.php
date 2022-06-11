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
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('config.responsecache.enabled')) {
            return $valueStorage->get('config.responsecache.enabled');
        }

        return config('responsecache.enabled', true);
    }

    protected function getDriver(): string {
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('config.responsecache.cache_store')) {
            return $valueStorage->get('config.responsecache.cache_store');
        }

        return config('responsecache.cache_store', 'database');
    }

    protected function getTime(): string {
        return gmdate("H:i:s", config('responsecache.cache_lifetime_in_seconds'));
    }
}
