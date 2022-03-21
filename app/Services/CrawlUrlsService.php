<?php

namespace App\Services;

use App\Models\Setting;
use Spatie\Crawler\Crawler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use App\Crawler\UrlCheckCrawlerObserver;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class CrawlUrlsService
{
    public function __construct() {
        File::delete(storage_path('/logs/laravel.log'));
        // File::delete(storage_path('/logs/query.log'));

        DB::select('UPDATE `static_pages` SET `check_url` = NULL WHERE `check_url` = 1;');

        Artisan::call('site-search:crawl');

        Crawler::create()
            ->setCrawlProfile(new CrawlInternalUrls(config('app.url')))
            ->setCrawlObserver(new UrlCheckCrawlerObserver())
            ->setUserAgent('fara-detva-crawl')
            ->setConcurrency(30)
            ->startCrawling(config('app.url'));

        Cache::forever('___RELOAD', false);
    }
}
