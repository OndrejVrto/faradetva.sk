<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Traits\Restorable;
use App\Traits\Publishable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Notice extends BaseModel implements HasMedia, Feedable {
    use Loggable;
    use Restorable;
    use HasFactory;
    use Publishable;
    use SoftDeletes;
    use InteractsWithMedia;
    use SingleTableInheritanceTrait;

    protected $table = 'notices';

    protected static string $singleTableTypeField = 'type_model';

    protected static string $singleTableType = 'General';

    protected static array $singleTableSubclasses = [
        NoticeAcolyte::class,
        NoticeChurch::class,
        NoticeLecturer::class
    ];

    protected static bool $throwInvalidAttributeExceptions = true;

    public string $collectionName = 'notice_pdf';

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

    public static function getFeedItems(): Collection {
        return Notice::visible()->limit(100)->get();
    }
}
