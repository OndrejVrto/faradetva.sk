<?php

declare(strict_types = 1);

namespace App\Models;


use App\Models\Source;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Picture extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'pictures';

    public $collectionName = 'picture';

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

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }

    public function registerMediaConversions(Media $media = null) : void {
        $this->addMediaConversion('optimize')
            ->optimize()
            ->withResponsiveImages();
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 100, 100);
    }
}
