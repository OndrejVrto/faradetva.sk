<?php

namespace App\Providers;

use App\Observers\GlobalObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot() {
        $MODELS = [
            \App\Models\Banner::class,
            \App\Models\Category::class,
            \App\Models\File::class,
            \App\Models\Gallery::class,
            \App\Models\Chart::class,
            \App\Models\ChartData::class,
            \App\Models\News::class,
            \App\Models\Notice::class,
            \App\Models\Picture::class,
            \App\Models\Priest::class,
            \App\Models\Slider::class,
            \App\Models\Source::class,
            \App\Models\StaticPage::class,
            \App\Models\Tag::class,
            \App\Models\Testimonial::class,
        ];

        foreach ($MODELS as $MODEL) {
            $MODEL::observe(GlobalObserver::class);
        }
    }
}
