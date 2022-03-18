<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use App\Services\CheckUrlsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
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
        // Setting::set('cache.default', 'file');
        Setting::set('cache.default', 'database');
        Artisan::call('cache:clear');
        toastr()->info(__('app.cache.data-start'));
        return to_route('admin.dashboard');
    }

    public function cacheDataStop(): RedirectResponse {
        Setting::set('cache.default', 'none');
        Artisan::call('cache:clear');
        toastr()->info(__('app.cache.data-stop'));
        return to_route('admin.dashboard');
    }

    public function cacheDataReset(): RedirectResponse {
        // Setting::set('cache.default', 'file');
        Setting::set('cache.default', 'database');
        Artisan::call('cache:clear');
        toastr()->info(__('app.cache.data-reset'));
        return to_route('admin.dashboard');
    }

    public function checkAllUrlStaticPages(): RedirectResponse {
        (new CheckUrlsService)->run(updateDB: true);

        toastr()->info(__('app.cache.check-all-url-static-pages'));
        return to_route('static-pages.index');
    }

    public function infoPHP() {
        return phpinfo();
    }
}
