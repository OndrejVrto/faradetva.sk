<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle() {
        info('Start Generate SiteMap - '.config('app.url'));
        // modify this to your own needs
        SitemapGenerator::create(config('app.url'))
            // ->maxTagsPerSitemap(20000)
            ->writeToFile(public_path('sitemap.xml'));
    }
}
