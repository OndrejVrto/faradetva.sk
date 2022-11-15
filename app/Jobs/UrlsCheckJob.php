<?php declare(strict_types=1);

namespace App\Jobs;

use Carbon\Carbon;
use Spatie\Crawler\Crawler;
use Illuminate\Bus\Queueable;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Crawler\UrlCheckCrawlProfile;
use Illuminate\Queue\SerializesModels;
use App\Crawler\UrlCheckCrawlerObserver;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UrlsCheckJob implements ShouldQueue {
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function handle(): void {
        File::delete(storage_path('/logs/laravel.log'));
        // File::delete(storage_path('/logs/query.log'));

        DB::select('UPDATE `static_pages` SET `check_url` = NULL WHERE `check_url` = 1;');

        $crawlerClientOptions = [
            RequestOptions::COOKIES => true,
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::TIMEOUT => 10,
            RequestOptions::ALLOW_REDIRECTS => false,
            RequestOptions::HEADERS => [
                'User-Agent' => 'fara-detva-crawl',
            ],
            'verify' => false // HTTP2 problem -  https://github.com/spatie/crawler/discussions/348
        ];

        Crawler::create($crawlerClientOptions)
            ->setConcurrency(5)
            ->setCrawlObserver(new UrlCheckCrawlerObserver())
            ->setCrawlProfile(new UrlCheckCrawlProfile(config('app.url')))
            ->startCrawling(config('app.url'));

        customConfig('crawler')
            ->put('___RELOAD', "false")
            ->put('CRAWLER.url_check', Carbon::now()->toISOString());
    }
}
