<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Jobs\UrlsCheckJob;
use App\Jobs\SiteSearchCrawlJob;
use Spatie\Valuestore\Valuestore;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;

class CacheController extends Controller
{
    private $valueStorage;

    public function __construct() {
        $this->valueStorage = Valuestore::make(config('farnost-detva.value_store'));
    }

    public function cachesStart(): RedirectResponse {
        Artisan::call('view:cache');
        Artisan::call('optimize');
        Artisan::call('event:cache');
        Artisan::call('permission:cache-reset');
        toastr()->info(__('app.cache.start'));
        return to_route('admin.dashboard');
    }

    public function cachesStop(): RedirectResponse {
        Artisan::call('optimize:clear');
        Artisan::call('permission:cache-reset');
        Artisan::call('schedule:clear-cache');
        Artisan::call('debugbar:clear');
        toastr()->info(__('app.cache.stop'));
        return to_route('admin.dashboard');
    }

    public function cachesReset(): RedirectResponse {
        Artisan::call('optimize:clear');
        Artisan::call('optimize');
        Artisan::call('view:cache');
        Artisan::call('event:cache');
        Artisan::call('permission:cache-reset');
        Artisan::call('schedule:clear-cache');
        Artisan::call('debugbar:clear');

        toastr()->info(__('app.cache.reset'));
        return to_route('admin.dashboard');
    }

    public function cacheDataStart(): RedirectResponse {
        $this->valueStorage->put('config.cache.default', 'database');
        $this->valueStorage->put('config.responsecache.enabled', true);

        ResponseCache::clear();
        Artisan::call('cache:clear');

        toastr()->info(__('app.cache.data-start'));
        return to_route('admin.dashboard');
    }

    public function cacheDataStop(): RedirectResponse {
        $this->valueStorage->put('config.cache.default', 'none');
        $this->valueStorage->put('config.responsecache.enabled', false);

        ResponseCache::clear();
        Artisan::call('cache:clear');

        toastr()->info(__('app.cache.data-stop'));
        return to_route('admin.dashboard');
    }

    public function cacheDataReset(): RedirectResponse {
        ResponseCache::clear();
        Artisan::call('cache:clear');

        toastr()->info(__('app.cache.data-reset'));
        return to_route('admin.dashboard');
    }



    public function crawlAllUrl(): RedirectResponse {
        dispatch(new UrlsCheckJob());

        toastr()->info(__('app.cache.crawl-all-url'));
        return to_route('admin.dashboard');
    }

    public function crawlSearch(): RedirectResponse {
        (new SiteSearchCrawlJob())->handle();

        toastr()->info(__('app.cache.crawl-search'));
        return to_route('admin.dashboard');
    }



    public function restartFailedJobs(): RedirectResponse {
        Artisan::call('queue:restart');
        toastr()->info(__('app.cache.restart-failed-jobs'));
        return to_route('admin.dashboard');
    }

    public function deleteFailedJobs(): RedirectResponse {
        Artisan::call('queue:flush');
        toastr()->info(__('app.cache.delete-failed-jobs'));
        return to_route('admin.dashboard');
    }

    public function infoPHP() {
        return phpinfo();
    }

    public function xdebugPHP() {
        // return xdebug_info();
        toastr()->info(__('Nič sa nevykoná lebo nemáš zapnutý xDebug v php.'));
        return to_route('admin.dashboard');
    }

    public function testFeatures() {
        // sem doplň hocijaký testovací kód alebo službu

        // $url = 'https://www.facebook.com/Farnos%C5%A5-Detva-103739418174148';


        toastr()->info(__('Novinka otestovaná'));
        return to_route('admin.dashboard');
    }
}
