<?php declare(strict_types=1);

namespace Spatie\SiteSearch;

use Spatie\Crawler\Crawler;
use Spatie\SiteSearch\Crawler\SearchProfileCrawlObserver;
use Spatie\SiteSearch\Crawler\SiteSearchCrawlProfile;
use Spatie\SiteSearch\Drivers\Driver;
use Spatie\SiteSearch\Exceptions\SiteSearchIndexDoesNotExist;
use Spatie\SiteSearch\Models\SiteSearchConfig;
use Spatie\SiteSearch\Profiles\SearchProfile;
use Spatie\SiteSearch\SearchResults\SearchResults;
use GuzzleHttp\RequestOptions;

final class SiteSearch {
    public static function index(string $indexName): self {
        $siteSearchConfig = SiteSearchConfig::firstWhere('name', $indexName);

        if (! $siteSearchConfig) {
            throw SiteSearchIndexDoesNotExist::make($indexName);
        }

        return self::make($siteSearchConfig);
    }

    public static function make(SiteSearchConfig $siteSearchConfig): self {
        $driver = $siteSearchConfig->getDriver();

        $profile = $siteSearchConfig->getProfile();

        return new static($siteSearchConfig->index_name, $driver, $profile);
    }

    public function __construct(
        protected string        $indexName,
        protected Driver        $driver,
        protected SearchProfile $searchProfile,
    ) {
    }

    public function crawl(string $baseUrl): self {
        $crawlProfile = new SiteSearchCrawlProfile($this->searchProfile, $baseUrl);

        $observer = new SearchProfileCrawlObserver(
            $this->indexName,
            $this->searchProfile,
            $this->driver
        );

        //! THIS IS REWRITE - START
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

        $crawler = Crawler::create($crawlerClientOptions)
            ->setCrawlProfile($crawlProfile)
            ->setCrawlObserver($observer);

        // $crawler = Crawler::create()
        // ->setCrawlProfile($crawlProfile)
        // ->setCrawlObserver($observer);
        //! THIS IS REWRITE - END

        $this->searchProfile->configureCrawler($crawler);

        $crawler->startCrawling($baseUrl);

        return $this;
    }

    public function search(string $query, ?int $limit = null, ?int $offset = 0): SearchResults {
        return $this->driver->search($this->indexName, $query, $limit, $offset);
    }
}
