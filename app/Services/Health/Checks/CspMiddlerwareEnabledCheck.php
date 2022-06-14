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
        $status = Valuestore::make(config('farnost-detva.value_store.config'))
                    ->get('config.csp.enabled');

        return is_null($status) ? config('csp.enabled') : $status;
    }
}
