<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Source;
use App\Models\BaseModel;
use App\Models\StaticPage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'banners';

    public $collectionName = 'banner';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function staticPages() {
        return $this->belongsToMany(StaticPage::class, 'static_page_banner', 'banner_id', 'static_page_id');
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }

    public function registerMediaConversions(Media $media = null) : void {
        $this->addMediaConversion('extra-large')
            ->fit(Manipulations::FIT_CROP, 1920, 480)    // 1200px and up
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('large')
            ->fit(Manipulations::FIT_CROP, 1440, 360)    // 992px to 1200px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('medium')
            ->fit(Manipulations::FIT_CROP, 1200, 300)    // 768px to 992px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('small')
            ->fit(Manipulations::FIT_CROP, 960, 240)     // 576px to 768px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('extra-small')
            ->fit(Manipulations::FIT_CROP, 720, 180)     // less than 576px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('crop-thumb')
            ->fit(Manipulations::FIT_CROP, 360, 90)
            ->sharpen(2)
            ->quality(60);
    }
}
