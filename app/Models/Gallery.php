<?php

declare(strict_types = 1);

namespace App\Models;


use App\Models\Source;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'galleries';

    public $collectionName = 'gallery_picture';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function picture() {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionName);
    }

    public function registerMediaConversions(Media $media = null) : void {
        if ($media->collection_name == $this->collectionName) {
            $this->addMediaConversion('orginal')
                ->optimize()
                ->withResponsiveImages();
            $this->addMediaConversion('thumb')
                ->height(200);
            $this->addMediaConversion('crop-thumb')
                ->fit("crop", 100, 100);
        }
    }
}