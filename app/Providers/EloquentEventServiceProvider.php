<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Chart;
use App\Models\Picture;
use App\Models\Category;
use App\Models\ChartData;
use App\Observers\TagObserver;
use App\Observers\NewsObserver;
use App\Observers\ChartObserver;
use App\Observers\PictureObserver;
use App\Observers\CategoryObserver;
use App\Observers\ChartDataObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{
    public function register() {
        //
    }

    public function boot() {
        Tag::observe(TagObserver::class);
        News::observe(NewsObserver::class);
        Chart::observe(ChartObserver::class);
        Picture::observe(PictureObserver::class);
        Category::observe(CategoryObserver::class);
        ChartData::observe(ChartDataObserver::class);
    }
}
