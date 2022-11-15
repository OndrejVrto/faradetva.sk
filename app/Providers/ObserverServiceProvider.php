<?php declare(strict_types=1);

namespace App\Providers;

use App\Observers\GlobalObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ObserverServiceProvider extends ServiceProvider {
    public function boot() {
        $models = [
            \App\Models\BackgroundPicture::class,
            \App\Models\Banner::class,
            \App\Models\Category::class,
            \App\Models\DayIdea::class,
            \App\Models\Faq::class,
            \App\Models\File::class,
            \App\Models\Gallery::class,
            \App\Models\Chart::class,
            \App\Models\ChartData::class,
            \App\Models\News::class,
            \App\Models\NoticeChurch::class,
            \App\Models\NoticeAcolyte::class,
            \App\Models\NoticeLecturer::class,
            \App\Models\Picture::class,
            \App\Models\Prayer::class,
            \App\Models\Priest::class,
            \App\Models\Slider::class,
            \App\Models\Source::class,
            \App\Models\StaticPage::class,
            \App\Models\Tag::class,
            \App\Models\Testimonial::class,
            \App\Models\User::class,
        ];

        foreach ($models as $model) {
            $model::observe(GlobalObserver::class);
        }
    }
}
