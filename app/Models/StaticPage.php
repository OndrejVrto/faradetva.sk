<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\CreatedUpdatedBy;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StaticPage extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'static_pages';

    protected $fillable = [
        'url',
        'route_name',
        'title',
        'description',
        'keywords',
        'author',
        'header'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug(Str::replace('/','-',$model->url));
        });

        static::updating(function ($model) {
            $model->slug = Str::slug(Str::replace('/','-',$model->url));
        });
    }

    public function registerMediaCollections( Media $media = null ) : void {
        $this->addMediaCollection('banner')
            ->singleFile()
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('crop')
                    ->fit("crop", 100, 100);
                $this->addMediaConversion('crop-thumb')
                    ->fit("crop", 40, 40);
            });

        $this->addMediaCollection('document');

        $this->addMediaCollection('galery')
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('crop')
                    ->fit("crop", 500, 500);
            });

        $this->addMediaCollection('picture')
            ->singleFile()
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('crop')
                    ->fit("crop", 10, 10);
            });
    }

    // public function getMediaFileNameAttribute() {
    //     return $this->getFirstMedia('testimonial')->file_name ?? null;
    // }
}
