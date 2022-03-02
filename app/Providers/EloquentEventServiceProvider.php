<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Chart;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Picture;
use App\Models\Category;
use App\Models\ChartData;
use App\Models\StaticPage;
use App\Observers\TagObserver;
use App\Observers\NewsObserver;
use App\Observers\ChartObserver;
use App\Observers\BannerObserver;
use App\Observers\GalleryObserver;
use App\Observers\PictureObserver;
use App\Observers\CategoryObserver;
use App\Observers\ChartDataObserver;
use App\Observers\StaticPageObserver;
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
        Banner::observe(BannerObserver::class);
        Gallery::observe(GalleryObserver::class);
        Picture::observe(PictureObserver::class);
        Category::observe(CategoryObserver::class);
        ChartData::observe(ChartDataObserver::class);
        StaticPage::observe(StaticPageObserver::class);
    }
}
