<?php

declare(strict_types = 1);

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'author',
        'author_url',
        'source',
        'source_url',
        'license',
        'license_url',
    ];

    public $collectionPicture = 'gallery_picture';

    public function getRouteKeyName() {
        return 'slug';
    }

    public function picture() {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionPicture);
    }

    public function registerMediaConversions(Media $media = null) : void {
        if ($media->collection_name == $this->collectionPicture) {
            $this->addMediaConversion('orginal')
                ->optimize()
                ->withResponsiveImages();
            $this->addMediaConversion('thumb')
                ->height(200);
        }
    }
}
