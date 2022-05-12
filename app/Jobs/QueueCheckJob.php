<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueCheckJob implements ShouldQueue
{
    use Queueable;

    public function handle() {
        return true;
    }
}
