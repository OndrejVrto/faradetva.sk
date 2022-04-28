<?php

declare(strict_types = 1);

namespace App\Jobs;

use Spatie\Crawler\Crawler;
use Illuminate\Bus\Queueable;
use GuzzleHttp\RequestOptions;
use App\Crawler\CustomCrawlProfile;
use App\Crawler\UrlCheckCrawlerObserver;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckUrlsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

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
            ->setCrawlProfile(new CustomCrawlProfile(config('app.url')))
            ->setCrawlObserver(new UrlCheckCrawlerObserver())
            ->setUserAgent('fara-detva-crawl')
            ->setConcurrency(20)
            ->startCrawling(config('app.url'));
    }
}
