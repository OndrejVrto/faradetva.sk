<?php

declare(strict_types = 1);

namespace App\Models;

use App\Traits\Publishable;
use App\Traits\CreatedUpdatedBy;
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
    use CreatedUpdatedBy;
    use InteractsWithMedia;

    protected $table = 'notices';

    protected $fillable = [
        'active',
        'slug',
        'published_at',
        'unpublished_at',
        'title',
    ];

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia('notice_pdf')->file_name ?? null;
    }
}