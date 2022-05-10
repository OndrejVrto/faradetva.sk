<?php

namespace App\Services\Health\Checks;

use Carbon\Carbon;
// use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;
use Spatie\Health\Checks\Checks\ScheduleCheck;

class CustomScheduleCheck extends ScheduleCheck
{
    // protected string $cacheKey = 'health.checks.schedule.latestHeartbeatAt';
    // protected ?string $cacheStoreName = null;
    // protected int $heartbeatMaxAgeInMinutes = 1;

    // public function useCacheStore(string $cacheStoreName): self  {
    //     $this->cacheStoreName = $cacheStoreName;
    //     return $this;
    // }

    public function getCacheStoreName(): string  {
        if ($this->cacheStoreName) {
            return $this->cacheStoreName;
        }

        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));
        if($valueStorage->has('config.cache.default')) {
            return $valueStorage->get('config.cache.default');
        }

        return config('cache.default', 'database');
    }

    // public function cacheKey(string $cacheKey): self {
    //     $this->cacheKey = $cacheKey;
    //     return $this;
    // }

    // public function heartbeatMaxAgeInMinutes(int $heartbeatMaxAgeInMinutes): self {
    //     $this->heartbeatMaxAgeInMinutes = $heartbeatMaxAgeInMinutes;
    //     return $this;
    // }

    // public function getCacheKey(): string {
    //     return $this->cacheKey;
    // }

    public function run(): Result {
        $this->label('health-results.schedule.label');
        $result = Result::make()
            ->ok('health-results.schedule.ok');

        $lastHeartbeatTimestamp = cache()->store($this->cacheStoreName)->get($this->cacheKey);
        if (! $lastHeartbeatTimestamp) {
            return $result->failed('health-results.schedule.failed');
        }

        $latestHeartbeatAt = Carbon::createFromTimestamp($lastHeartbeatTimestamp);
        $minutesAgo = $latestHeartbeatAt->diffInMinutes() + 1;
        if ($minutesAgo > $this->heartbeatMaxAgeInMinutes) {
            return $result->failed('health-results.schedule.failed_time')
            ->meta(['minutes' => $minutesAgo]);
        }

        return $result;
    }
}
