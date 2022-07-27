<?php

namespace App\Crawler;

use Spatie\Crawler\Crawler;
use GuzzleHttp\RequestOptions;
use Spatie\SiteSearch\Profiles\DefaultSearchProfile;

class SearchCrawlProfile extends DefaultSearchProfile {
    public function configureCrawler(Crawler $crawler): void {
        $crawlerClientOptions = [
            RequestOptions::COOKIES => true,
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::TIMEOUT => 10,
            RequestOptions::ALLOW_REDIRECTS => false,
            RequestOptions::HEADERS => [
                'User-Agent' => 'fara-detva-crawl',
            ],
            'verify' => false // HTTPS problem -  https://github.com/spatie/crawler/discussions/348   SSL certificate problem: unable to get local issuer certificate
        ];

        unset($crawler);

        $crawler = Crawler::create($crawlerClientOptions);
    }
}
