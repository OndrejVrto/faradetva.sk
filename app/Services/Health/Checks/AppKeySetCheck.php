<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class AppKeySetCheck extends Check {
    public function run(): Result {
        $name = 'health-results.app_key_set';
        $this->label("$name.label");

        return config('app.key') !== null
            ? Result::make("$name.ok")
            : Result::make()->failed("$name.failed");
    }
}
