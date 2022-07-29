<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use App\Jobs\QueueCheckJob;
use Illuminate\Support\Str;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class QueueWorkCheck extends Check {
    public function run(): Result {
        $name = 'health-results.queue_work';
        $this->label("$name.label");

        $key   = 'HEALTH.check.queue.proces';
        $new_value = Str::uuid();
        (new QueueCheckJob($key, $new_value))->handle();
        sleep(1);
        $stored_value = customConfig('health-checks', $key, false);

        if ($stored_value == $new_value) {
            return Result::make("$name.ok");
        }

        return Result::make()->warning("$name.failed");
    }
}
