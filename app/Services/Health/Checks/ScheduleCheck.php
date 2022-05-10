<?php

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;
use Spatie\Health\Checks\Checks\ScheduleCheck as SpatieScheduleCheck;

class ScheduleCheck extends SpatieScheduleCheck
{
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
