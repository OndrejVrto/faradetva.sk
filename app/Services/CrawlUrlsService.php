<?php

namespace App\Services;

use Spatie\Crawler\Crawler;
use GuzzleHttp\RequestOptions;
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

        $crawlerClientOptions = [
            RequestOptions::COOKIES => true,
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::TIMEOUT => 10,
            RequestOptions::ALLOW_REDIRECTS => false,
            RequestOptions::HEADERS => [
                'User-Agent' => '*',
            ],
            'verify' => false // HTTP2 problem -  https://github.com/spatie/crawler/discussions/348
        ];

        Crawler::create($crawlerClientOptions)
            ->setCrawlProfile(new CrawlInternalUrls(config('app.url')))
            ->setCrawlObserver(new UrlCheckCrawlerObserver())
            ->setUserAgent('fara-detva-crawl')
            ->setConcurrency(30)
            ->startCrawling(config('app.url'));

        Cache::forever('___RELOAD', false);
    }
}
