<?php

namespace App\Services\Health\Checks;

use function app;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class MaintenanceModeCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.maintenance.label');

        $actualMaintenace = app()->isDownForMaintenance();
        $result = Result::make();

        if (false === $actualMaintenace) {
            return $result
                ->notificationMessage('health-results.maintenance.ok')
                ->ok();
        }

        $data = json_decode(file_get_contents(storage_path().'/framework/down'), true);
        if (is_null($data['secret'])) {
            return $result
                ->shortSummary('health-results.maintenance.failed-no-key-short')
                ->failed('health-results.maintenance.failed-no-key');
        }

        return $result->meta([
            'secret' => $data['secret'],
        ])
        ->shortSummary('health-results.maintenance.failed-short')
        ->failed('health-results.maintenance.failed');
    }
}
