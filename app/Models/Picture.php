<?php

declare(strict_types = 1);

namespace App\Models;


use App\Models\Source;
use App\Models\BaseModel;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Picture extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'pictures';

    public $collectionName = 'picture';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('optimize')
            ->fit(Manipulations::FIT_MAX, 1280, 960)
            ->sharpen(2)
            ->quality(60)
            ->withResponsiveImages();
        $this->addMediaConversion('crop-thumb')
            ->height(100)
            ->sharpen(2)
            ->quality(60);
    }
}
