<?php

namespace App\Listeners;

use Illuminate\Bus\Queueable;
use App\Services\CrawlUrlsService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class CachePages implements ShouldQueue
{
    use Queueable;

    public function __invoke() {
        if (!Cache::has('___RELOAD') OR true == Cache::get('___RELOAD')) {
            new CrawlUrlsService;
        }
    }
}
