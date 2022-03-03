<?php

declare(strict_types = 1);

namespace App\Models;

use App\Traits\Publishable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use Publishable;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'notices';

    public $collectionName = 'notice_pdf';

    protected $fillable = [
        'active',
        'slug',
        'published_at',
        'unpublished_at',
        'title',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }
}
