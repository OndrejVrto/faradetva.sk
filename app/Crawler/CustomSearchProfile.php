<?php

namespace App\Crawler;

use Spatie\Crawler\Crawler;
use Spatie\SiteSearch\Profiles\DefaultSearchProfile;

Class CustomSearchProfile extends DefaultSearchProfile
{
    public function configureCrawler(Crawler $crawler): void
    {
        $crawler->setUserAgent('fara-detva-crawl');
    }
}
