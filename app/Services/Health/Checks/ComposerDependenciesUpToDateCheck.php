<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class ComposerDependenciesUpToDateCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.actual_composer_dependencies.label');

        $result = Result::make();

        chdir(base_path());
        exec("composer install --dry-run 2>&1", $output, $status);
        $output = implode('-', $output);

        return strstr($output, 'Nothing to install')
            ? $result->notificationMessage("health-results.actual_composer_dependencies.ok")->ok()
            : $result->warning("health-results.actual_composer_dependencies.failed");
    }
}
