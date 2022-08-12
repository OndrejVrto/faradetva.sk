<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Str;
use Spatie\SchemaOrg\Graph;
use Illuminate\Http\Request;
use App\Overrides\CustomJsonLd;
use App\Services\QueryLogService;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    public function register(): void {

        View::share('maintenanceMode', app()->isDownForMaintenance());

        //! Blade extensions
        Blade::directive('datetime', fn ($expression) => "<?php echo ($expression)->format('m/d/Y H:i'); ?>");

        Str::macro('readDurationWords', function ($totalWords) {
            $minutesToRead = round($totalWords / 210);  // Slovenčina: priemer 180-250 slov za minútu
            return (int) max(1, $minutesToRead);
        });

        Str::macro('readDurationText', fn (...$text) => Str::readDurationWords(str_word_count(implode(" ", $text))));

        // Plain text from Html
        Str::macro('plainText', fn (...$text) => trim(preg_replace('!\s+!', ' ', preg_replace("/\r|\n/", " ", html_entity_decode(strip_tags(implode(" ", $text)))))));

        $this->app->singleton('seo-graph', fn () => new Graph());
        $this->app->singleton('seo-schema', fn () => new CustomJsonLd(config('seotools.json-ld.defaults', [])));
    }

    public function boot(Request $request): void {
        if ($request->userAgent() !== 'Symfony') {
            Paginator::useBootstrap();

            //! rewrite some global site setting from ValueStore Json
            Config::set(customConfig()->all());

            //! only for Dev
            if ($request->userAgent() !== 'fara-detva-crawl' && App::environment(['local', 'dev', 'staging'])) {
                //! correctly url adres in Nqrock
                if (!empty(config('farnost-detva.ngrok_url')) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
                    $this->app['url']->forceRootUrl(config('farnost-detva.ngrok_url'));
                }

                //! Loging Query-s to log file
                new QueryLogService();
            }
        }
    }
}
