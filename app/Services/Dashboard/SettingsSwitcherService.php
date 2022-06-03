<?php

namespace App\Services\Dashboard;

use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;
use Spatie\Health\Commands\RunHealthChecksCommand;

class SettingsSwitcherService
{
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

    public function cache_global($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cache_global');

        if ($require === $actual) {
            info('1. cache_global'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cache_global', false);
            $this->valueStorage->put('config.cache.default', 'none');
            Artisan::call('cache:clear');
            info('1. cache_global'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cache_global', true);
        $this->valueStorage->put('config.cache.default', 'database');
        info('1. cache_global'.' > on');
        return;
    }

    public function cache_response($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cache_response');

        if ($require === $actual) {
            info('2. cache_response'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cache_response', false);
            $this->valueStorage->put('config.responsecache.enabled', false);
            ResponseCache::clear();
            info('2. cache_response'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cache_response', true);
        $this->valueStorage->put('config.responsecache.enabled', true);
        info('2. cache_response'.' > on');
        return;
    }

    public function cookie($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cookie');

        if ($require === $actual) {
            info('3. cookie'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cookie', false);
            $this->valueStorage->put('config.cookie-consent.enabled', false);
            info('3. cookie'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cookie', true);
        $this->valueStorage->put('config.cookie-consent.enabled', true);
        info('3. cookie'.' > on');
        return;
    }

    public function cache_route($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cache_route');

        if ($require === $actual) {
            info('4. cache_route'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cache_route', false);
            Artisan::call('route:clear');
            info('4. cache_route'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cache_route', true);
        Artisan::call('route:cache');
        info('4. cache_route'.' > on');
    }

    public function cache_config($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cache_config');

        if ($require === $actual) {
            info('5. cache_config'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cache_config', false);
            Artisan::call('config:clear');
            info('5. cache_config'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cache_config', true);
        Artisan::call('config:cache');
        info('5. cache_config'.' > on');
    }

    public function cache_event($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cache_event');

        if ($require === $actual) {
            info('6. cache_event'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cache_event', false);
            Artisan::call('event:clear');
            info('6. cache_event'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cache_event', true);
        Artisan::call('event:cache');
        info('6. cache_event'.' > on');
    }

    public function cache_google_font($require): void {
        $actual = (bool) $this->valueStorage->get('ADMIN.cache_google_font');

        if ($require === $actual) {
            info('7. cache_google_font'.' > none');
            return;
        }

        if (false === $require) {
            $this->valueStorage->put('ADMIN.cache_google_font', false);
            $this->valueStorage->put('config.google-fonts.inline', false);
            info('7. cache_google_font'.' > OFF');
            return;
        }

        $this->valueStorage->put('ADMIN.cache_google_font', true);
        $this->valueStorage->put('config.google-fonts.inline', true);
        info('7. cache_google_font'.' > on');
        return;
    }

}
