<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class EnvFileExistsCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.env_exists.label');

        $result = Result::make();

        return file_exists(base_path('.env'))
            ? $result->ok("health-results.env_exists.ok")
            : $result->warning("health-results.env_exists.failed");
    }
}
