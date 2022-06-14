<?php

namespace App\Services\Health\Checks;

use function app;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class EnvironmentCheck extends Check
{
    protected string $expectedEnvironment = 'production';

    public function expectEnvironment(string $expectedEnvironment): self {
        $this->expectedEnvironment = $expectedEnvironment;
        return $this;
    }

    public function run(): Result {
        $name = 'health-results.environment';
        $this->label("$name.label");

        $actualEnvironment = (string)app()->environment();

        $result = Result::make()
            ->meta([
                'actual' => $actualEnvironment,
                'expected' => $this->expectedEnvironment,
            ])
            ->shortSummary($actualEnvironment);

        return $this->expectedEnvironment === $actualEnvironment
            ? $result->notificationMessage("$name.ok")->ok()
            : $result->failed("$name.failed");
    }
}
