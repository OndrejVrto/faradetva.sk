<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class ConfigIsCachedCheck extends Check
{
    public function run(): Result {
        $name = 'health-results.config_cached';
        $this->label("$name.label");

        return true === app()->configurationIsCached()
            ? Result::make("$name.ok")
            : Result::make()->warning("$name.failed");
    }
}
