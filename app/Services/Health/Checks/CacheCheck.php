<?php

namespace App\Services\Health\Checks;

use Exception;
use Illuminate\Support\Str;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Support\Facades\Cache;

class CacheCheck extends Check
{
    public function run(): Result {
        $name = 'health-results.cache';
        $this->label("$name.label");

        $driver = customConfig('config', 'cache.default');

        $result = Result::make();
        try {
            $this->canWriteValuesToCache($driver)
                ? $result->notificationMessage("$name.ok")->ok()
                : $result->failed("$name.failed");
        } catch (Exception $exception) {
            $result->failed("$name.exception");
            $exceptionMessage = $exception->getMessage();
        }

        return $result->meta([
            'driver' => $driver,
            'exceptionMessage' => $exceptionMessage ?? '',
        ]);
    }

    protected function canWriteValuesToCache(string $driver): bool {
        $expectedValue = Str::random(5);

        Cache::driver($driver)->put('laravel-health:check', $expectedValue, 10);

        $actualValue = Cache::driver($driver)->get('laravel-health:check');

        return $actualValue == $expectedValue;
    }
}
