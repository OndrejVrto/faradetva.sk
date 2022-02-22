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

class File extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'files';

    public $collectionName = 'attachment';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'author',
        'author_url',
        'source',
        'source_url',
        'license',
        'license_url',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
