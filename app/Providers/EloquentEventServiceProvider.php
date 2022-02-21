<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use App\Observers\TagObserver;
use App\Observers\NewsObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{
    public function register() {
        //
    }

    public function boot() {
        Tag::observe(TagObserver::class);
        News::observe(NewsObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
