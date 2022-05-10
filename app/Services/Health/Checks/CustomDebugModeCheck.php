<?php

namespace App\Services\Health\Checks;

use function config;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;

class CustomDebugModeCheck extends Check
{
    public function run(): Result
    {
        $this->label('health-results.debug_mode.label');

        $actual = $this->getMode();

        $result = Result::make();

        return false === $actual
            ? $result->ok('health-results.debug_mode.ok')
            : $result->failed('health-results.debug_mode.failed');
    }

    protected function getMode(): bool {
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('config.app.debug')) {
            return $valueStorage->get('config.app.debug');
        }

        return config('app.debug');
    }
}
