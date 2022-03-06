<?php

namespace App\Providers;

// use App\Listeners\ResetPageCache;
// use Illuminate\Auth\Events\Login;
// use Illuminate\Auth\Events\Logout;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
        // Logout::class => [
        //     ResetPageCache::class,
        // ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot() {
        // Event::listen([
        //     'eloquent.created: *',
        //     'eloquent.updated: *',
        //     'eloquent.deleted: *',
        //     'eloquent.restored: *',
        // ], function($event) {
        //     Log::info($event);
        //     Cache::put('EXPIRE_CACHE', 'true');
        // });
    }
}
