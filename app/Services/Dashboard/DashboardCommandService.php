<?php

namespace App\Services\Dashboard;

use App\Jobs\UrlsCheckJob;
use App\Jobs\SiteSearchCrawlJob;
use App\Futures\FutureTestService;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;

class DashboardCommandService
{
    public function run(string $command = null) {
        if (method_exists($this, $command)){
            $this->$command();
        }
    }

    public function php_info() {
        phpinfo();
    }

    public function testFeatures() {
        (new FutureTestService)->run();
    }

    public function clean_directories() {
        Artisan::call('debugbar:clear');
        Artisan::call('media-library:clean');
        Artisan::call('clean:directories');
    }

    public function cache_reset() {
        Artisan::call('optimize:clear');
        Artisan::call('optimize');
        Artisan::call('view:cache');
        Artisan::call('event:cache');
        Artisan::call('permission:cache-reset');
        Artisan::call('schedule:clear-cache');
        Artisan::call('debugbar:clear');
    }

    public function cache_data_reset() {
        ResponseCache::clear();
        Artisan::call('cache:clear');
    }

    public function failed_jobs_delete() {
        Artisan::call('queue:flush');
    }

    public function jobs_restart() {
        Artisan::call('queue:restart');
    }

    public function crawl_url() {
        dispatch(new UrlsCheckJob());
    }

    public function crawl_search() {
        (new SiteSearchCrawlJob())->handle();
    }
}
