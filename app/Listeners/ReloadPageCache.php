<?php

namespace App\Listeners;

use Illuminate\Bus\Queueable;
use App\Services\CheckUrlsService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReloadPageCache implements ShouldQueue
{
    use Queueable;

    public function __invoke() {
        if (!Cache::has('___RELOAD') OR true == Cache::get('___RELOAD')) {
            (new CheckUrlsService)->run(updateDB: false);
        }
    }
}
