<?php

namespace App\Services\Health\Checks;

use App\Jobs\QueueCheckJob;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Artisan;

class QueueWorkCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.queue_work.label');

        $result = Result::make();

        try {
            $queue = 'health-check';

            Queue::pushOn($queue, new QueueCheckJob());

            $connection = config('queue.default', 'database');

            Artisan::call('queue:work', [$connection, '--queue' => $queue, '--once' => true]);

            return $result->notificationMessage("health-results.queue_work.ok")->ok();
        } catch (\Throwable $e) {
            return $result->warning("health-results.queue_work.failed");
        }
    }
}
