<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Spatie\Valuestore\Valuestore;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueCheckJob implements ShouldQueue
{
    use Queueable;

    public function __construct(private string $key, private string $value){}

    public function handle() {

        Valuestore::make(config('farnost-detva.value_store.health-checks'))
            ->put($this->key, $this->value);

        return true;
    }
}
