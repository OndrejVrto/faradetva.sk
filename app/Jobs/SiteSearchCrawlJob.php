<?php

declare(strict_types=1);

namespace App\Jobs;

use Carbon\Carbon;
use Spatie\SiteSearch\Jobs\CrawlSiteJob;
use Spatie\SiteSearch\Models\SiteSearchConfig;

class SiteSearchCrawlJob {
    public function handle() {
        SiteSearchConfig::enabled()
            ->each(function (SiteSearchConfig $siteSearchConfig) {
                dispatch(new CrawlSiteJob($siteSearchConfig));
            });

        customConfig('crawler')
            ->put('___RELOAD', "false")
            ->put('CRAWLER.site_search', Carbon::now()->toISOString());
    }
}
