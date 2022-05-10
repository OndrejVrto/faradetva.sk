<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class EventsAreCachedCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.event_cached.label');

        $result = Result::make();

        return app()->eventsAreCached() === true
            ? $result->ok("health-results.event_cached.ok")
            : $result->warning("health-results.event_cached.failed");
    }
}
