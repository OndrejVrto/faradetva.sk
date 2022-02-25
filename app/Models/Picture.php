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

class Picture extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;
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
            // ->fit("crop", 1440, 360)
            ->optimize();
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 100, 100);
    }
}
