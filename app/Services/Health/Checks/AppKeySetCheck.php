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
            ? $result->notificationMessage("health-results.app_key_set.ok")->ok()
            : $result->failed("health-results.app_key_set.failed");
    }
}
