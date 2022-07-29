<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class EnvFileExistsCheck extends Check {
    public function run(): Result {
        $name = 'health-results.env_exists';
        $this->label("$name.label");

        return true == file_exists(base_path('.env'))
            ? Result::make("$name.ok")
            : Result::make()->warning("$name.failed");
    }
}
