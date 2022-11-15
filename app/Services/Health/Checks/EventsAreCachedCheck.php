<?php declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class EventsAreCachedCheck extends Check {
    public function run(): Result {
        $name = 'health-results.event_cached';
        $this->label("$name.label");

        return true == app()->eventsAreCached()
            ? Result::make("$name.ok")
            : Result::make()->warning("$name.failed");
    }
}
