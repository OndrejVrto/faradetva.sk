<?php

namespace App\Services\Dashboard;

use App\Jobs\UrlsCheckJob;
use App\Jobs\GenerateSitemapJob;
use App\Jobs\SiteSearchCrawlJob;
use Illuminate\Support\Facades\Artisan;
use App\Services\Dashboard\FutureTestService;
use Spatie\ResponseCache\Facades\ResponseCache;

class DashboardCommandService
{
    public function run(string $command = null) {
        if (method_exists($this, $command)){
            $this->$command();
        }
    }

    private function php_info() {
        phpinfo(); exit;
    }

    private function testFeatures() {
        (new FutureTestService)->run();
    }

    private function clean_directories() {
        Artisan::call('debugbar:clear');
        Artisan::call('media-library:clean');
        Artisan::call('clean:directories');
    }

    private function cache_reset() {
        Artisan::call('optimize:clear');
        Artisan::call('optimize');
        Artisan::call('view:cache');
        Artisan::call('event:cache');
        Artisan::call('permission:cache-reset');
        Artisan::call('schedule:clear-cache');
        Artisan::call('debugbar:clear');
    }

    private function cache_data_reset() {
        ResponseCache::clear();
        Artisan::call('cache:clear');
    }

    private function failed_jobs_delete() {
        Artisan::call('queue:flush');
    }

    private function jobs_restart() {
        // Artisan::call('queue:restart');
        Artisan::call('queue:retry', ['--queue' => 'default']);
    }

    private function crawl_url() {
        dispatch(new UrlsCheckJob());
    }

    private function crawl_search() {
        (new SiteSearchCrawlJob())->handle();
    }

    private function crawl_sitemap() {
        (new GenerateSitemapJob())->handle();
    }
}
