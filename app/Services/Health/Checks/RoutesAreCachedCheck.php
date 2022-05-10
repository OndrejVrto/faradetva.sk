<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class RoutesAreCachedCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.route_cached.label');

        $result = Result::make();

        return app()->routesAreCached() === true
            ? $result->ok("health-results.route_cached.ok")
            : $result->warning("health-results.route_cached.failed");
    }
}
