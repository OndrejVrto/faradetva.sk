<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function startCaches() {
        Artisan::call('config:cache -q');
        Artisan::call('route:cache -q');
        Artisan::call('optimize -q');
        Artisan::call('view:cache -q');

        toastr()->info(__('app.cache.start'));
        return redirect()->route('admin.dashboard');
    }

    public function clearCaches() {
        Artisan::call('config:clear -q');
        Artisan::call('route:clear -q');
        Artisan::call('optimize:clear -q');
        Artisan::call('view:clear -q');

        toastr()->info(__('app.cache.stop'));
        return redirect()->route('admin.dashboard');
    }

    public function clearDataCaches() {
        Artisan::call('cache:clear -q');

        toastr()->info(__('app.cache.stop-data'));
        return redirect()->route('admin.dashboard');
    }

    public function resetCaches () {
        Artisan::call('config:clear -q');
        Artisan::call('route:clear -q');
        Artisan::call('optimize:clear -q');
        Artisan::call('view:clear -q');

        Artisan::call('cache:clear -q');

        Artisan::call('config:cache -q');
        Artisan::call('route:cache -q');
        Artisan::call('optimize -q');
        Artisan::call('view:cache -q');

        toastr()->info(__('app.cache.reset'));
        return redirect()->route('admin.dashboard');
    }
}
