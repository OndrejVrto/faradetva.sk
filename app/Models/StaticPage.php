<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Faq;
use App\Models\File;
use App\Models\Banner;
use App\Models\Source;
use App\Traits\Restorable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StaticPage extends Model implements HasMedia
{
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'static_pages';

    public $collectionName = 'static_page_representing_image';

    protected $fillable = [
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
    ];

    protected $casts = [
        'check_url' => 'boolean',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

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

    public function mediaOne() {
        return $this->morphOne(config('media-library.media_model'), 'model');
    }

    public function picture() {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionName);
    }

    public function registerMediaConversions(Media $media = null) : void {
        if ($media->collection_name == $this->collectionName) {

            $this->addMediaConversion('crop-thumb')
                ->fit("crop", 100, 50)
                ->optimize();
            $this->addMediaConversion('optimize')
                // ->height(960)
                // ->width(1024)
                ->fit('contain', 1920, 1440)
                ->quality(30)
                ->optimize();
            $this->addMediaConversion('thumb')
                ->fit('contain', 256, 256)
                ->optimize();
            $this->addMediaConversion('facebook')
                ->fit('contain', 960, 480)
                ->quality(30)
                ->optimize();
            $this->addMediaConversion('twitter')
                ->fit("crop", 960, 480)    // ratio 2:1  minimum 300x157 or maximum 4096x4096 px
                ->quality(30)
                ->optimize();
            $this->addMediaConversion('section-list')
                ->fit("crop", 232, 272)
                ->optimize()
                ->withResponsiveImages();
        }
    }

}
