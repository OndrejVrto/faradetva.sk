<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Str;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;
use Spatie\Health\Commands\RunHealthChecksCommand;

class SettingsSwitcherService
{
    public ?string $secretKey = null;

    private $valueStorage;

    public function __construct() {
        $this->valueStorage = Valuestore::make(config('farnost-detva.value_store'));
    }

    public function __destruct() {
        // update config cache
        if (true === $this->valueStorage->get('ADMIN.cache_config')) {
            Artisan::call('config:clear');
            Artisan::call('config:cache');
        }
        // refresh Health checks
        Artisan::call(RunHealthChecksCommand::class);
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

    public function maintenance_mode(bool $requiredMode): void {
        if ($requiredMode === app()->isDownForMaintenance()) return;

        if (true === $requiredMode) {
            $secretKey = Str::uuid();
            Artisan::call('down', ['--secret' => $secretKey]);
            // TODO: send email to administrator if is run maintenance mode
            $this->secretKey = $secretKey;
        } else {
            Artisan::call('up');
        }
    }

    public function cache_global($require): void {
        if ($require === (bool) $this->valueStorage->get('ADMIN.cache_global')) return;
        if (false === $require) {
            Artisan::call('cache:clear');
            $this->valueStorage
                ->put('ADMIN.cache_global', false)
                ->put('config.cache.default', 'none');
        } else {
            $this->valueStorage
                ->put('ADMIN.cache_global', true)
                ->put('config.cache.default', 'database');
        }
    }

    public function app_enviroment_mode($require): void {
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

    public function cache_response($require): void {
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

    public function cache_route($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_route',
            config       : null,
            artisanFalse : 'route:clear',
            artisanTrue  : 'route:cache'
        );
    }

    public function cache_config($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_config',
            config       : null,
            artisanFalse : 'config:clear',
            artisanTrue  : 'config:cache'
        );
    }

    public function cache_event($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_event',
            config       : null,
            artisanFalse : 'event:clear',
            artisanTrue  : 'event:cache'
        );
    }

    public function cookie($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cookie',
            config       : 'config.cookie-consent.enabled',
        );
    }

    public function cache_google_font($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.cache_google_font',
            config       : 'config.google-fonts.inline',
        );
    }

    public function csp($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.csp',
            config       : 'config.csp.enabled',
        );
    }

    public function app_debug($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_debug',
            config       : 'config.app.debug',
        );
    }

    public function app_debugbar($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_debugbar',
            config       : 'config.debugbar.enabled',
        );
    }

    public function app_query_log($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_query_log',
            config       : 'config.farnost-detva.guery_loging',
        );
    }

    public function app_query_detector($require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'ADMIN.app_query_detector',
            config       : 'config.querydetector.enabled',
        );
    }


}
