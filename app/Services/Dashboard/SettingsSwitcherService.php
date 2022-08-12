<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use Illuminate\Support\Str;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;
use Spatie\Health\Commands\RunHealthChecksCommand;

class SettingsSwitcherService {
    public ?string $secretKey = null;

    // private $config;
    private readonly Valuestore $checkbox;

    public function __construct() {
        // $this->config   = customConfig();
        $this->checkbox = customConfig('dashboard-checkbox');
    }

    public function __destruct() {
        // update config cache
        if (true == boolval($this->checkbox->get('cache_config'))) {
            Artisan::call('config:cache', ['--quiet' => true, '--no-interaction' => true]);
        }
        // refresh Health checks
        Artisan::call(RunHealthChecksCommand::class, ['--quiet' => true, '--no-interaction' => true]);
    }

    public function run(bool $value, string $command = null): void {
        if (method_exists($this, $command)) {
            $this->$command($value);
        }
    }

    private function handle(
        bool   $require,
        string $valueStore,
        string $config = null,
        string $artisanFalse = null,
        string $artisanTrue = null
    ): void {
        if ($require === $this->convertValueFromStore($valueStore)) {
            return;
        }

        if (false == $require) {
            $this->checkbox->put($valueStore, "false");
            if ($config) {
                customConfig('config', [$config => false]);
            }
            if ($artisanFalse) {
                Artisan::call($artisanFalse, ['--quiet' => true, '--no-interaction' => true]);
            }
            // info($valueStore.' > OFF');
            return;
        }

        $this->checkbox->put($valueStore, "true");
        if ($config) {
            customConfig('config', [$config => true]);
        }
        if ($artisanTrue) {
            Artisan::call($artisanTrue, ['--quiet' => true, '--no-interaction' => true]);
        }
        // info($valueStore.' > ON');
        return;
    }

    private function convertValueFromStore(string $valueStore): bool {
        return (boolean) filter_var($this->checkbox->get($valueStore), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Switches
     */
    private function maintenance_mode(bool $require): void {
        // dd($require, app()->isDownForMaintenance());
        if ($require == app()->isDownForMaintenance()) {
            return;
        }
        if (true == $require) {
            $this->secretKey = Str::uuid()->toString();
            Artisan::call('down', ['--secret' => $this->secretKey]);

            // TODO: send email to all administrator with secret key url
            Log::channel('slack')->alert('Aplikácia je prepnutá do údržbového módu.', [
                'Secret url' => url(route('home').'/'.$this->secretKey),
                'Uživateľ ktorý vypol aplikáciu' => Auth::user()->name,
                'Uživateľov e-mail' => Auth::user()->email,
            ]);
            $this->checkbox->put('maintenance_mode', "true");
        } else {
            $this->checkbox->put('maintenance_mode', "false");
            Artisan::call('up');
            Log::channel('slack')->alert('Aplikácia je opäť spustená.', [
                'Uživateľ ktorý spustil aplikáciu' => Auth::user()->name,
            ]);
        }
    }

    private function cache_global(bool $require): void {
        if ($require === $this->convertValueFromStore('cache_global')) {
            return;
        }
        if (false == $require) {
            Artisan::call('cache:clear', ['--quiet' => true, '--no-interaction' => true]);
            $this->checkbox->put('cache_global', "false");
            customConfig('config', ['cache.default' => 'none']);
        } else {
            $this->checkbox->put('cache_global', "true");
            customConfig('config', ['cache.default' => 'file']);
        }
    }

    private function app_enviroment_mode(bool $require): void {
        if ($require === $this->convertValueFromStore('app_enviroment_mode')) {
            return;
        }
        if (false == $require) {
            $this->checkbox->put('app_enviroment_mode', "false");
            customConfig('config', ['app.env' => 'production']);
        } else {
            $this->checkbox->put('app_enviroment_mode', "true");
            customConfig('config', ['app.env' => 'local']);
        }
    }

    private function cache_response(bool $require): void {
        if ($require === $this->convertValueFromStore('cache_response')) {
            return;
        }
        if (false == $require) {
            ResponseCache::clear();
            $this->checkbox->put('cache_response', "false");
            customConfig('config', ['responsecache.enabled' => false]);
        } else {
            $this->checkbox->put('cache_response', "true");
            customConfig('config', ['responsecache.enabled' => true]);
        }
    }

    private function cache_route(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'cache_route',
            config       : null,
            artisanFalse : 'route:clear',
            artisanTrue  : 'route:cache'
        );
    }

    private function cache_config(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'cache_config',
            config       : null,
            artisanFalse : 'config:clear',
            // artisanTrue  : 'config:cache'
        );
    }

    private function cache_event(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'cache_event',
            config       : null,
            artisanFalse : 'event:clear',
            artisanTrue  : 'event:cache'
        );
    }

    private function cookie(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'cookie',
            config       : 'cookie-consent.enabled',
        );
    }

    private function cache_google_font(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'cache_google_font',
            config       : 'google-fonts.inline',
        );
    }

    private function content_security_policy(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'content_security_policy',
            config       : 'csp.enabled',
        );
    }

    private function app_debug(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'app_debug',
            config       : 'app.debug',
        );
    }

    private function app_query_log(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'app_query_log',
            config       : 'farnost-detva.guery_loging',
        );
    }

    private function app_query_detector(bool $require): void {
        $this->handle(
            require      : $require,
            valueStore   : 'app_query_detector',
            config       : 'querydetector.enabled',
        );
    }
}
