<?php

namespace App\Services\Health\Checks;

use Exception;
use Illuminate\Support\Str;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Cache;

class CacheCheck extends Check
{
    public function run(): Result {
        $driver = $this->defaultDriver();
        $this->label('health-results.cache.label');

        $result = Result::make();

        try {
            $this->canWriteValuesToCache($driver)
                ? $result->notificationMessage("health-results.cache.ok")->ok()
                : $result->failed("health-results.cache.failed");
        } catch (Exception $exception) {
            $result->failed("health-results.cache.exception");
            $exceptionMessage = $exception->getMessage();
        }

        return $result->meta([
            'driver' => $driver,
            'exceptionMessage' => $exceptionMessage ?? '',
        ]);
    }

    protected function defaultDriver(): string {
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('config.cache.default')) {
            return $valueStorage->get('config.cache.default');
        }

        return config('cache.default', 'database');
    }

    protected function canWriteValuesToCache(string $driver): bool {
        $expectedValue = Str::random(5);

        Cache::driver($driver)->put('laravel-health:check', $expectedValue, 10);

        $actualValue = Cache::driver($driver)->get('laravel-health:check');

        return $actualValue === $expectedValue;
    }
}
