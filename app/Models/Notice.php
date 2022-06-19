<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\BaseModel;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Traits\Restorable;
use App\Traits\Publishable;
use App\Models\NoticeChurch;
use App\Models\NoticeAcolyte;
use App\Models\NoticeLecturer;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Notice extends BaseModel implements HasMedia, Feedable
{
    use Loggable;
    use Restorable;
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
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean',
        'notified' => 'boolean',
        'deleted_at' => 'datetime',
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
    ];

    public function toFeedItem(): FeedItem {
        return FeedItem::create()
            ->id("oznamy/$this->id")
            ->title($this->title)
            ->updated($this->updated_at)
            ->summary($this->title)
            ->link($this->getFirstMedia('notice_pdf')->getFullUrl())
            ->authorName("Farská kancelária")
            ->category($this->type_model);
    }

    public static function getFeedItems() {
        return Notice::visible()->get();
    }
}
