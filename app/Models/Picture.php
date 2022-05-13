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
        'crop_output_width',
        'crop_output_height',
        'crop_output_exact_dimensions',
    ];

    protected $casts = [
        'title'                        => 'string',
        'slug'                         => 'string',
        'crop_output_width'            => 'integer',
        'crop_output_height'           => 'integer',
        'crop_output_exact_dimensions' => 'boolean',
    ];

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function mediaOne() {
        return $this->morphOne(config('media-library.media_model'), 'model');
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }

    public $registerMediaConversionsUsingModelInstance = true;

    public function registerMediaConversions(Media $media = null): void {
        if ($this->crop_output_exact_dimensions == 1) {
            $this->addMediaConversion('optimize')
                ->fit(Manipulations::FIT_CROP, $this->crop_output_width, $this->crop_output_height)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 100 * ($this->crop_output_width / $this->crop_output_height), 100)
                ->sharpen(2)
                ->quality(60);
        } else {
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
}
