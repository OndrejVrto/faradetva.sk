<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\QueryLogService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
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

            Str::macro('readDurationWords', function($totalWords) {
                $minutesToRead = round($totalWords / 210);  // Slovenčina: priemer 180-250 slov za minútu
                return (int) max(1, $minutesToRead);
            });

            Str::macro('readDurationText', function(...$text) {
                return Str::readDurationWords(str_word_count(implode(" ", $text)));
            });

            // Plain text from Html
            Str::macro('plainText', function(...$text) {
                return trim( preg_replace('!\s+!', ' ', preg_replace( "/\r|\n/", " ", html_entity_decode( strip_tags( implode(" ", $text) ) ) ) ) );
            });

            //! singleton for aplly cache time whole page
            $this->app->singleton(CacheResponseMiddleware::class);

            //! only for Dev
            if ($request->userAgent() !== 'fara-detva-crawl' AND App::environment(['local', 'dev', 'staging'])) {
                //! correctly url adres in Nqrock
                if (!empty(config('farnost-detva.ngrok_url')) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
                    $this->app['url']->forceRootUrl(config('farnost-detva.ngrok_url'));
                }

                //! Loging Query-s to log file
                new QueryLogService;
            }
        }
    }
}
