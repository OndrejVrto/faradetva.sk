<?php

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use Spatie\Health\Checks\Result;
use Spatie\Health\Checks\Checks\ScheduleCheck as SpatieScheduleCheck;

class ScheduleCheck extends SpatieScheduleCheck
{
    protected int $heartbeatMaxAgeInMinutes = 5;

    public function getCacheStoreName(): string  {
        if ($this->cacheStoreName) {
            return $this->cacheStoreName;
        }

        return customConfig('config', 'cache.default');
    }

    public function run(): Result {
        $name = 'health-results.schedule';
        $this->label("$name.label");

        $result = Result::make();

        if (app()->isDownForMaintenance()) {
            return $result->warning("$name.warning_maintenance");
        }

        $lastHeartbeatTimestamp = cache()->store($this->cacheStoreName)->get($this->cacheKey);
        if (! $lastHeartbeatTimestamp) {
            return $result->failed("$name.failed");
        }

        $latestHeartbeatAt = Carbon::createFromTimestamp($lastHeartbeatTimestamp);
        $minutesAgo = $latestHeartbeatAt->diffInMinutes() + 1;
        if ($minutesAgo > $this->heartbeatMaxAgeInMinutes) {
            return $result->failed("$name.failed_time")
                ->meta(['minutes' => $minutesAgo]);
        }

        return $result->notificationMessage("$name.ok")->ok();
    }
}
