<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BackgroundPicture extends BaseModel implements HasMedia {
    use InteractsWithMedia;

    protected $table = 'background_pictures';

    public string $collectionName = 'background_picture';

    protected $fillable = [
        'title',
        'slug',
    ];

    protected $casts = [
        'title' => 'string',
        'slug'  => 'string',
    ];

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('extra-large')
            ->fit(Manipulations::FIT_CROP, 1920, 1440)    // 1200px and up
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('large')
            ->fit(Manipulations::FIT_CROP, 1440, 1080)    // 992px to 1200px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('medium')
            ->fit(Manipulations::FIT_CROP, 1200, 900)    // 768px to 992px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('small')
            ->fit(Manipulations::FIT_CROP, 960, 720)        // 576px to 768px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('extra-small')
            ->fit(Manipulations::FIT_CROP, 720, 540)        // less than 576px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('crop-thumb')
            ->fit(Manipulations::FIT_CROP, 192, 144)
            ->sharpen(2)
            ->quality(60);
    }
}
