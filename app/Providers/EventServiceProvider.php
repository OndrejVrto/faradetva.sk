<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use App\Observers\TagObserver;
use App\Observers\NewsObserver;
use App\Observers\CategoryObserver;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        Tag::observe(TagObserver::class);
        News::observe(NewsObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
