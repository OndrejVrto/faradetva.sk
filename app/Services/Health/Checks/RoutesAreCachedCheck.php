<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class RoutesAreCachedCheck extends Check {
    public function run(): Result {
        $name = 'health-results.route_cached';
        $this->label("$name.label");

        return true == app()->routesAreCached()
            ? Result::make("$name.ok")
            : Result::make()->warning("$name.failed");
    }
}
