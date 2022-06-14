<?php

declare(strict_types = 1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Spatie\Valuestore\Valuestore;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateSitemapJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function handle() {
        SitemapGenerator::create(config('app.url'))
            // ->maxTagsPerSitemap(20000)
            ->writeToFile(public_path('sitemap.xml'));

        customConfig('crawler')
            ->put('___RELOAD', false)
            ->put('CRAWLER.sitemap', now());
    }
}
