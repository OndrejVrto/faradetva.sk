<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueCheckJob implements ShouldQueue {
    use Queueable;

    public function __construct(private string $key, private string $value) {
    }

    public function handle() {
        customConfig('health-checks')->put($this->key, $this->value);

        return true;
    }
}
