<?php declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class MaintenanceModeCheck extends Check {
    public function run(): Result {
        $name = 'health-results.maintenance';
        $this->label("$name.label");

        $result = Result::make();
        if (false == app()->isDownForMaintenance()) {
            return $result
                ->notificationMessage("$name.ok")
                ->ok();
        }

        $data = json_decode(file_get_contents(storage_path('framework').'down') ?: '{}', true, 512, JSON_THROW_ON_ERROR);
        if (is_null($data['secret'])) {
            return $result
                ->shortSummary("$name.failed-no-key-short")
                ->failed("$name.failed-no-key");
        }

        return $result->meta([
                'secret' => $data['secret'],
            ])
            ->shortSummary("$name.failed-short")
            ->failed("$name.failed");
    }
}
