<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
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
            //! for Production
            Paginator::useBootstrap();

            // rewrite some global site setting from DB
            foreach (Setting::all() as $setting) {
                Config::set($setting->key, $setting->value);
            }

            //! Blade extensions
            Blade::directive('datetime', function ($expression) {
                return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
            });

            //! singleton for aplly cache time whole page
            $this->app->singleton(CacheResponseMiddleware::class);


            //! for Develop
            // correctly url adres in Nqrock
            if (!empty( env('NGROK_URL') ) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
                $this->app['url']->forceRootUrl(env('NGROK_URL'));
            }

            //! Loging all Query-s to log file
            File::prepend(
                storage_path('/logs/query.log'),
                PHP_EOL . '---------------------------------------------------------------------------' . PHP_EOL . PHP_EOL . PHP_EOL
            );
            DB::listen(function ($query) {
                File::prepend(
                    storage_path('/logs/query.log'),
                        '[' . date('Y-m-d H:i:s') . '] [' . $query->time . ' ms]' .
                        PHP_EOL . $query->sql .
                        PHP_EOL . '{' . implode(', ', $query->bindings) . '}' .
                        PHP_EOL . PHP_EOL
                );
            });
        }
    }
}
