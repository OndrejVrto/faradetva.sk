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

class Banner extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'banners';

    public $collectionName = 'banner';

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
        //1920x480px (240*60)
        $this->addMediaConversion('extra-large')
            ->fit("crop", 1920, 480)    // 1200px and up
            ->optimize();
        $this->addMediaConversion('large')
            ->fit("crop", 1440, 360)    // 992px to 1200px
            ->optimize();
        $this->addMediaConversion('medium')
            ->fit("crop", 1200, 300)    // 768px to 992px
            ->optimize();
        $this->addMediaConversion('small')
            ->fit("crop", 960, 240)        // 576px to 768px
            ->optimize();
        $this->addMediaConversion('extra-small')
            ->fit("crop", 720, 180)        // less than 576px
            ->optimize();
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 360, 90);
    }
}
