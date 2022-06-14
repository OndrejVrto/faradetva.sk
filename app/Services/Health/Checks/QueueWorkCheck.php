<?php

namespace App\Services\Health\Checks;

use App\Jobs\QueueCheckJob;
use Composer\Util\Loop;
use Illuminate\Support\Str;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Artisan;

class QueueWorkCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.queue_work.label');

        $result = Result::make();

        try {
            $key   = 'HEALTH.check.queue.proces';
            $value = Str::uuid();

            (new QueueCheckJob($key, $value))->handle();

            $store_value = Valuestore::make(config('farnost-detva.value_store.health-checks'))
                ->get('HEALTH.check.queue.proces');

            if ($store_value != $value) {
                return $result->warning("health-results.queue_work.failed");
            }

            return $result->notificationMessage("health-results.queue_work.ok")->ok();
        } catch (\Throwable $e) {
            return $result->warning("health-results.queue_work.failed");
        }
    }
}
