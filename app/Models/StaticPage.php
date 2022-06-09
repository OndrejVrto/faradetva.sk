<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Faq;
use App\Models\File;
use App\Models\Banner;
use App\Models\Source;
use App\Enums\PageType;
use App\Models\BaseModel;
use App\Traits\Restorable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StaticPage extends BaseModel implements HasMedia
{
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'static_pages';

    public $collectionName = 'static_page_representing_image';

    protected $fillable = [
        'active',
        'virtual',
        'type_page',
        'title',
        'url',
        'slug',
        'route_name',
        'description_page',
        'keywords',
        'author_page',
        'header',
        'check_url',
        'teaser',
        'wikipedia',
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean',
        'virtual' => 'boolean',
        'check_url' => 'boolean',
        'deleted_at' => 'datetime',
        'type_page' => PageType::class,
    ];

    public function files() {
        return $this->hasMany(File::class);
    }

    public function banners() {
        return $this->belongsToMany(Banner::class, 'static_page_banner', 'static_page_id', 'banner_id');
    }

    public function faqs() {
        return $this->belongsToMany(Faq::class, 'static_page_faq', 'static_page_id', 'faq_id');
    }

    public function getFullUrlAttribute() {
        return url($this->url);
    }

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function picture() {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionName);
    }

    public function registerMediaConversions(Media $media = null) : void {
        if ($media->collection_name == $this->collectionName) {
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 100, 50)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('representing')
                ->fit(Manipulations::FIT_CROP, 960, 480)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('representing-thumb')
                ->fit(Manipulations::FIT_CONTAIN, 256, 256)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('card')
                ->fit(Manipulations::FIT_CROP, 370, 248)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
        }
    }
}
