<?php

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;
use Spatie\Health\Checks\Checks\ScheduleCheck as SpatieScheduleCheck;

class ScheduleCheck extends SpatieScheduleCheck
{
    protected int $heartbeatMaxAgeInMinutes = 5;

    public function getCacheStoreName(): string  {
        if ($this->cacheStoreName) {
            return $this->cacheStoreName;
        }

        $name = Valuestore::make(config('farnost-detva.value_store.config'))
                            ->get('config.cache.default');

        return is_null($name) ? config('cache.default', 'database') : $name;
    }

    public function run(): Result {
        $this->label('health-results.schedule.label');

        $result = Result::make()
            ->notificationMessage('health-results.schedule.ok')->ok();

        if (app()->isDownForMaintenance()) {
            return $result->warning('health-results.schedule.warning_maintenance');
        }

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
