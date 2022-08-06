<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends BaseModel implements HasMedia {
    use InteractsWithMedia;

    protected $table = 'galleries';

    public string $collectionName = 'gallery_picture';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function picture(): MorphMany {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionName);
    }

    public function registerMediaConversions(Media $media = null): void {
        if ($media->collection_name == $this->collectionName) {
            $this->addMediaConversion('orginal')
                ->fit(Manipulations::FIT_MAX, 1280, 960)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('thumb')
                ->height(200)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 100, 100)
                ->sharpen(2)
                ->quality(60);
        }
    }
}
