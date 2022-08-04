<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Picture extends BaseModel implements HasMedia {
    use InteractsWithMedia;

    protected $table = 'pictures';

    public string $collectionName = 'picture';

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

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function mediaOne(): MorphOne {
        return $this->morphOne(config('media-library.media_model'), 'model');
    }

    public function getMediaFileNameAttribute(): ?string {
        return $this->getFirstMedia($this->collectionName)?->file_name ?? null;
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
