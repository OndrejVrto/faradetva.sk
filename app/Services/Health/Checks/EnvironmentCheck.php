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
        $actualEnvironment = (string)app()->environment();
        $this->label('health-results.environment.label');

        $result = Result::make()
            ->meta([
                'actual' => $actualEnvironment,
                'expected' => $this->expectedEnvironment,
            ])
            ->shortSummary($actualEnvironment);

        return $this->expectedEnvironment === $actualEnvironment
            ? $result->notificationMessage('health-results.environment.ok')->ok()
            : $result->failed('health-results.environment.failed');
    }
}
