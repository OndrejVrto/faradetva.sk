<?php

namespace App\Services\Health\Checks;

use function config;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;

class CspMiddlerwareEnabledCheck extends Check
{
    public function run(): Result
    {
        $this->label('health-results.csp_enabled.label');

        $actual = $this->getStatusCsp();

        $result = Result::make();

        return true === $actual
            ? $result->notificationMessage('health-results.csp_enabled.ok')->ok()
            : $result->warning('health-results.csp_enabled.failed');
    }

    private function getStatusCsp(): bool {
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('config.csp.enabled')) {
            return $valueStorage->get('config.csp.enabled');
        }

        return config('csp.enabled', true);
    }
}
