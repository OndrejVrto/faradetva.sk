<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Jobs\UrlsCheckJob;
use App\Jobs\GenerateSitemapJob;
use App\Jobs\SiteSearchCrawlJob;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;

class DashboardCommandService {
    public function run(string $command = null): void {
        if (method_exists($this, $command)) {
            $this->$command();
        }
    }

    private function php_info(): never {
        phpinfo();
        exit;
    }

    private function testFeatures(): void {
        (new FutureTestService())->run();
    }

    private function clean_directories(): void  {
        Artisan::call('debugbar:clear', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('media-library:clean', ['--force', '--quiet' => true, '--no-interaction' => true]);
        Artisan::call('clean:directories', ['--quiet' => true, '--no-interaction' => true]);
    }

    private function cache_reset(): void  {
        Artisan::call('optimize:clear', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('optimize', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('view:cache', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('event:cache', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('permission:cache-reset', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('schedule:clear-cache', ['--quiet' => true, '--no-interaction' => true]);
        Artisan::call('debugbar:clear', ['--quiet' => true, '--no-interaction' => true]);
    }

    private function cache_data_reset(): void  {
        ResponseCache::clear();
        Artisan::call('cache:clear', ['--quiet' => true, '--no-interaction' => true]);
    }

    private function failed_jobs_delete(): void  {
        Artisan::call('queue:flush', ['--quiet' => true, '--no-interaction' => true]);
    }

    private function jobs_restart(): void  {
        // Artisan::call('queue:restart');
        Artisan::call('queue:retry', ['--queue' => 'default', '--quiet' => true, '--no-interaction' => true]);
    }

    private function crawl_url(): void  {
        dispatch(new UrlsCheckJob());
    }

    private function crawl_search(): void  {
        (new SiteSearchCrawlJob())->handle();
    }

    private function crawl_sitemap(): void  {
        (new GenerateSitemapJob())->handle();
    }
}
