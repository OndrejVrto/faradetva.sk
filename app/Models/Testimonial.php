<?php

namespace App\Models;

use App\Traits\SlugFromName;
use App\Traits\CreatedUpdatedBy;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use SlugFromName;
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'testimonials';

    protected $fillable = [
        'active',
        'name',
        'phone',
        'function',
        'description',
    ];

    public function registerMediaConversions( Media $media = null ) : void {
        $this->addMediaConversion('crop')
            ->fit("crop", 800, 800);
            // ->optimize();
            // ->withResponsiveImages();
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 60, 60);
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia('testimonial')->file_name ?? null;
    }
}

