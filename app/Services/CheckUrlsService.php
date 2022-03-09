<?php

namespace App\Services;

use Spatie\Crawler\Crawler;
use Illuminate\Support\Facades\DB;
use App\Crawler\CacheCrawlerObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class CheckUrlsService
{
    public function run(bool $updateDB = false): void {
        // clear cache and reset DB column
        File::delete(
            storage_path('/logs/laravel.log')
        );

        if ($updateDB) {
            Artisan::call('cache:clear');
            DB::select('UPDATE `static_pages` SET `check_url` = NULL WHERE `check_url` = 1;');
        }

        Crawler::create()
            ->setCrawlProfile(new CrawlInternalUrls(config('app.url')))
            ->setCrawlObserver(new CacheCrawlerObserver($updateDB))
            ->setParseableMimeTypes(['text/html', 'text/plain'])
            ->setUserAgent('fara-detva-crawl')
            ->setConcurrency(30)
            ->startCrawling(config('app.url'));

        Cache::forever('___RELOAD', false);
    }
}
