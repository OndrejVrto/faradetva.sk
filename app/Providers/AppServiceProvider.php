<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\QueryLogService;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\CacheResponseMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function register() {
        //
    }

    public function boot(Request $request) {
        if ($request->userAgent() !== 'Symfony') {
            Paginator::useBootstrap();

            //! rewrite some global site setting from DB
            foreach (Setting::all() as $setting) {
                Config::set($setting->key, $setting->value);
            }

            //! Blade extensions
            Blade::directive('datetime', function ($expression) {
                return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
            });

            //! singleton for aplly cache time whole page
            $this->app->singleton(CacheResponseMiddleware::class);

            //! only for Dev
            if ( $request->userAgent() !== 'fara-detva-crawl' AND App::environment(['local', 'dev', 'staging'])) {
                //! correctly url adres in Nqrock
                if (!empty(env('NGROK_URL')) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
                    $this->app['url']->forceRootUrl(env('NGROK_URL'));
                }

                //! Loging Query-s to log file
                (new QueryLogService)->run();
            }
        }
    }
}
