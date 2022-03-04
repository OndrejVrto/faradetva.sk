<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use App\Models\StaticPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Collection;

class CacheController extends Controller
{
    public function cachesStart(): RedirectResponse {
        Setting::set('cache.default', 'file');
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
        Artisan::call('cache:clear');
        Setting::set('cache.default', 'none');
        toastr()->info(__('app.cache.data-stop'));
        return to_route('admin.dashboard');
    }

    public function cacheDataReset(): RedirectResponse {
        Artisan::call('cache:clear');
        toastr()->info(__('app.cache.data-reset'));
        return to_route('admin.dashboard');
    }

    public function checkAllUrlStaticPages(): RedirectResponse {
        $pages = StaticPage::all();
        $this->checkUrl($pages);

        toastr()->info(__('app.cache.check-all-url-static-pages'));
        return to_route('static-pages.index');
    }

    public function checkUrlStaticPages(): RedirectResponse {
        $pages = StaticPage::whereNull('check_url')->orWhere('check_url', 0)->get();
        $this->checkUrl($pages);

        toastr()->info(__('app.cache.check-url-static-pages'));
        return to_route('static-pages.index');
    }

    public function infoPHP() {
        return phpinfo();
    }

    private function checkUrl(Collection $pages): void {
        foreach($pages as $page) {
            $url = config('app.url') . '/' . $page->url;
            $headers = @get_headers($url, true);
            $exists = ($headers && strpos( $headers[0], '200')) ? true : false;

            StaticPage::find($page->id)->update([
                'check_url' => (int)$exists,
            ]);
        }
    }
}
