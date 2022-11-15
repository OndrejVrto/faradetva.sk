<?php declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class CspMiddlerwareEnabledCheck extends Check {
    public function run(): Result {
        $name = 'health-results.csp_enabled';
        $this->label("$name.label");

        return true == customConfig('config', 'csp.enabled')
            ? Result::make("$name.ok")
            : Result::make()->warning("$name.failed");
    }
}
