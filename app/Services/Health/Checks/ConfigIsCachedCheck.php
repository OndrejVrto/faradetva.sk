<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class ConfigIsCachedCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.config_cached.label');

        $result = Result::make();

        return app()->configurationIsCached() === true
            ? $result->notificationMessage("health-results.config_cached.ok")->ok()
            : $result->warning("health-results.config_cached.failed");
    }
}
