<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class AppKeySetCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.app_key_set.label');

        $result = Result::make();

        return config('app.key') !== null
            ? $result->ok("health-results.app_key_set.ok")
            : $result->failed("health-results.app_key_set.failed");
    }
}
