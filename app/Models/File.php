<?php

declare(strict_types = 1);

namespace App\Models;


use App\Models\Source;
use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class File extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'files';

    public $collectionName = 'attachment';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }
}
