<?php

namespace App\Listeners;

use App\Models\StaticPage;
use Illuminate\Bus\Queueable;
use App\Services\CheckUrlsService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReloadPageCache implements ShouldQueue
{
    use Queueable;

    public function __invoke()
    {
        $PAGES = [
            '/',
            'oznamy',
            'clanky',
            'kontakt',
        ];

        if (!Cache::has('___RELOAD') OR true == Cache::get('___RELOAD')) {
            Artisan::call('cache:clear');
            (new CheckUrlsService)->checkUrl(StaticPage::all());
            (new CheckUrlsService)->checkUrl($PAGES);
        }
    }
}
