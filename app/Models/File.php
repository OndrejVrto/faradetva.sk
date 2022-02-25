<?php

declare(strict_types = 1);

namespace App\Models;


use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;
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
