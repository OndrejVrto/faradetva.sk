<?php

declare(strict_types=1);

namespace Yoeunes\Toastr;

use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ToastrServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void {
        if ($this->app instanceof LaravelApplication) {
            $this->publishes([$this->configPath() => config_path('toastr.php')], 'toastr-config');
        }

        $this->registerBladeDirectives();
    }

    /**
     * Set the config path.
     *
     * @return string
     */
    protected function configPath(): string {
        return toastr_path(__DIR__.'/config/toastr.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void {
        $this->mergeConfigFrom($this->configPath(), 'toastr');

        $this->app->singleton('toastr', function (Container $app) {
            return new Toastr($app['session'], $app['config']);
        });

        $this->app->alias('toastr', Toastr::class);
    }

    public function registerBladeDirectives(): void {
        Blade::directive('toastr_render', function ($nonce) {
            return "<?php echo app('toastr')->render($nonce); ?>";
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array {
        return [
            'toastr',
        ];
    }
}
