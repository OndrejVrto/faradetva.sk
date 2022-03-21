<?php

namespace App\Providers;

use App\Listeners\CachePages;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     */
    protected $listen = [
        Logout::class => [
            CachePages::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot() {
        //
    }
}
