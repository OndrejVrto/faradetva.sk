<?php

declare(strict_types = 1);

namespace App\Models;

use App\Traits\Publishable;
use App\Models\NoticeChurch;
use App\Models\NoticeAcolyte;
use App\Models\NoticeLecturer;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Notice extends Model implements HasMedia
{
    use Loggable;
    use HasFactory;
    use Publishable;
    use SoftDeletes;
    use InteractsWithMedia;
    use SingleTableInheritanceTrait;

    protected $table = 'notices';

    protected static $singleTableTypeField = 'type_model';

    protected static $singleTableType = 'General';

    protected static $singleTableSubclasses = [
        NoticeAcolyte::class,
        NoticeChurch::class,
        NoticeLecturer::class
    ];

    protected static $throwInvalidAttributeExceptions = true;

    public $collectionName = 'notice_pdf';

    protected $fillable = [
        'active',
        'slug',
        'published_at',
        'unpublished_at',
        'notified',
        'title',
    ];

    protected $casts = [
        'active' => 'boolean',
        'notified' => 'boolean',
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
