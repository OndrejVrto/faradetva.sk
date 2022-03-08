<?php

declare(strict_types = 1);

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'testimonials';

    public $collectionName = 'testimonial';

    protected $fillable = [
        'active',
        'name',
        'slug',
        'phone',
        'function',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function registerMediaConversions( Media $media = null ) : void {
        $this->addMediaConversion('crop')
            ->fit("crop", 800, 800);
            // ->optimize();
            // ->withResponsiveImages();
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 60, 60);
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }
}

