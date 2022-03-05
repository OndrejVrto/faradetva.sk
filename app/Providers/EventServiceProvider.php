<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
// use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
     *
     * @return void
        //
    }
        //
