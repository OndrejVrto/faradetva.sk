<?php

declare(strict_types = 1);

namespace App\Models;


use App\Models\Source;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class File extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'files';

    public $collectionName = 'attachment';

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
}
