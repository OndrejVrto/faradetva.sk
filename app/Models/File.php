<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\StaticPage;
use App\Traits\CreatedUpdatedBy;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    // use SlugFromName;
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'files';

    protected $fillable = [
        'file_type_id',
        'static_page_id',
        'name',
        'slug',
        'author',
        'description',
        'source',
    ];

    public function fileType() {
        return $this->belongsTo(FileType::class, 'file_type_id');
    }

    public function page() {
        return $this->belongsTo(StaticPage::class, 'static_page_id');
    }

    // public function registerMediaCollections( Media $media = null ) : void {
    //     $this->addMediaCollection('banner')
    //         ->singleFile()
    //         ->registerMediaConversions(function (Media $media = null) {
    //             $this->addMediaConversion('crop')
    //                 ->fit("crop", 100, 100);
    //             $this->addMediaConversion('crop-thumb')
    //                 ->fit("crop", 40, 40);
    //         });

    //     $this->addMediaCollection('document');

    //     $this->addMediaCollection('galery')
    //         ->registerMediaConversions(function (Media $media = null) {
    //             $this->addMediaConversion('crop')
    //                 ->fit("crop", 500, 500);
    //         });

    //     $this->addMediaCollection('picture')
    //         ->singleFile()
    //         ->registerMediaConversions(function (Media $media = null) {
    //             $this->addMediaConversion('crop')
    //                 ->fit("crop", 10, 10);
    //         });
    // }

    // public function getMediaFileNameAttribute() {
    //     return $this->getFirstMedia('testimonial')->file_name ?? null;
    // }
}
