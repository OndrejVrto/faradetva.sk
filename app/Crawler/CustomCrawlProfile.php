<?php

namespace App\Crawler;

use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class CustomCrawlProfile extends CrawlInternalUrls
{
    public function __construct(
        protected mixed $baseUrl,
    ) {
        parent::__construct($this->baseUrl);
    }

    public function shouldCrawl(UriInterface $url): bool
    {

        if (! str_starts_with((string)$url, (string)$this->baseUrl)) {
            return false;
        }

        if ($this->isConfiguredNotToBeCrawled($url)) {
            return false;
        }

        return $this->baseUrl->getHost() === $url->getHost();
    }

    protected function isConfiguredNotToBeCrawled(UriInterface $url): bool
    {
        foreach (config('farnost-detva.do_not_crawl_urls') as $configuredUrl) {
            if (fnmatch($configuredUrl, $url->getPath())) {
                return true;
            }
        }

        return false;
    }
}
