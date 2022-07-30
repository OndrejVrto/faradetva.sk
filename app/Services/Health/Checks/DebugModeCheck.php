<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class DebugModeCheck extends Check {
    public function run(): Result {
        $name = 'health-results.debug_mode';
        $this->label("$name.label");

        return false == customConfig('config', 'app.debug')
            ? Result::make("$name.ok")
            : Result::make()->failed("$name.failed");
    }
}
