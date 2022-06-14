<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Str;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;
use Spatie\Health\Commands\RunHealthChecksCommand;

class SettingsSwitcherService
{
    public ?string $secretKey = null;

    private $valueStorage;

    public function __construct() {
        $this->valueStorage = Valuestore::make(config('farnost-detva.value_store.config'));
    }

    public function __destruct() {
        // update config cache
        if (true === $this->valueStorage->get('ADMIN.cache_config')) {
            Artisan::call('config:cache');
        }
        // refresh Health checks
        Artisan::call(RunHealthChecksCommand::class);
    }

    public function run(string $command = null, bool $value) {
        if (method_exists($this, $command)){
            $this->$command($value);
        }
    }

    private function handle(
        bool   $require,
        string $valueStore,
        string $config = null,
        string $artisanFalse = null,
        string $artisanTrue = null
    ) {
        if ($require === (bool) $this->valueStorage->get($valueStore)) return;

        if (false === $require) {
            $this->valueStorage->put($valueStore, false);
            if($config){
                $this->valueStorage->put($config, false);
            }
            if ($artisanFalse) {
                Artisan::call($artisanFalse);
            }
            // info($valueStore.' > OFF');
            return;
        }

        $this->valueStorage->put($valueStore, true);
        if ($config) {
            $this->valueStorage->put($config, true);
        }
        if ($artisanTrue) {
            Artisan::call($artisanTrue);
        }
        // info($valueStore.' > ON');
        return;
    }

    private function maintenance_mode(bool $require): void {
        if ($require === app()->isDownForMaintenance()) return;
        if (true === $require) {
            $secretKey = Str::uuid();
            Artisan::call('down', ['--secret' => $secretKey]);

            // TODO: send email to all administrator with secret key url
            Log::channel('slack')->warning('Aplikácia je prepnutá do údržbového módu.', [
                'Secret url' => url(route('home').'/'.$secretKey),
                'Uživateľ ktorý spustil mód' => Auth::user()->name,
                'Uživateľov e-mail' => Auth::user()->email,
            ]);
            $this->secretKey = $secretKey;
        } else {
            Artisan::call('up');
            Log::channel('slack')->info('Aplikácia je opäť spustená.', [
                'Uživateľ ktorý spustil aplikáciu' => Auth::user()->name,
            ]);
        }
    }

    private function cache_global(bool $require): void {
        if ($require === (bool) $this->valueStorage->get('ADMIN.cache_global')) return;
        if (false === $require) {
            Artisan::call('cache:clear');
            $this->valueStorage
                ->put('ADMIN.cache_global', false)
                ->put('config.cache.default', 'none');
        } else {
            $this->valueStorage
                ->put('ADMIN.cache_global', true)
                ->put('config.cache.default', 'file');
        }
    }

    private function app_enviroment_mode(bool $require): void {
        if ($require === (bool) $this->valueStorage->get('ADMIN.app_enviroment_mode')) return;
        if (false === $require) {
            $this->valueStorage
                ->put('ADMIN.app_enviroment_mode', false)
                ->put('config.app.env', 'production');
        } else {
            $this->valueStorage
                ->put('ADMIN.app_enviroment_mode', true)
                ->put('config.app.env', 'local');
        }
    }

    private function cache_response(bool $require): void {
        if ($require === (bool) $this->valueStorage->get('ADMIN.cache_response')) return;
        if (false === $require) {
            ResponseCache::clear();
            $this->valueStorage
                ->put('ADMIN.cache_response', false)
                ->put('config.responsecache.enabled', false);
        } else {
            $this->valueStorage
                ->put('ADMIN.cache_response', true)
                ->put('config.responsecache.enabled', true);
        }
    }

    private function cache_route(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_route',
            config       : null,
            artisanFalse : 'route:clear',
            artisanTrue  : 'route:cache'
        );
    }

    private function cache_config(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_config',
            config       : null,
            artisanFalse : 'config:clear',
            // artisanTrue  : 'config:cache'
        );
    }

    private function cache_event(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_event',
            config       : null,
            artisanFalse : 'event:clear',
            artisanTrue  : 'event:cache'
        );
    }

    private function cookie(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cookie',
            config       : 'config.cookie-consent.enabled',
        );
    }

    private function cache_google_font(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_google_font',
            config       : 'config.google-fonts.inline',
        );
    }

    private function csp(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.csp',
            config       : 'config.csp.enabled',
        );
    }

    private function app_debug(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_debug',
            config       : 'config.app.debug',
        );
    }

    private function app_query_log(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_query_log',
            config       : 'config.farnost-detva.guery_loging',
        );
    }

    private function app_query_detector(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_query_detector',
            config       : 'config.querydetector.enabled',
        );
    }
}
