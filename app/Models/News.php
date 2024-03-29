<?php declare(strict_types=1);

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Traits\Restorable;
use App\Traits\Publishable;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use App\Services\PurifyAutolinkService;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use OndrejVrto\Visitors\Contracts\Visitable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use OndrejVrto\Visitors\Traits\InteractsWithVisits;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends BaseModel implements HasMedia, Feedable, Visitable {
    use Loggable;
    use Restorable;
    use HasFactory;
    use Publishable;
    use SoftDeletes;
    use InteractsWithMedia;
    use InteractsWithVisits;

    protected $table = 'news';

    public string $collectionName = 'front_picture';

    public string $collectionDocument = 'attachment';

    public string $collectionAlbum = 'album';

    protected $fillable = [
        'active',
        'prioritized',
        'user_id',
        'published_at',
        'unpublished_at',
        'category_id',
        'title',
        'slug',
        'content',
        'teaser',
        'notified',
        'deleted_at'
    ];

    protected $casts = [
        'active' => 'boolean',
        'notified' => 'boolean',
        'prioritized' => 'boolean',
        'count_words' => 'integer',
        'deleted_at' => 'datetime',
        'content_plain' => 'string',
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
    ];

    protected $appends = [
        'read_duration',
    ];

    protected $perPage = 10;

    public function scopeNewsComplete(Builder $query): Builder {
        return $query
                    ->orderByDesc('prioritized')
                    ->visible()
                    ->with('media', 'user', 'category', 'source');
    }

    public function setTeaserAttribute(?string $value): void {
        $this->attributes['teaser'] = empty($value)
            ? Str::words($this->content_plain ?? '', 50)
            : $value;
    }

    public function getCleanTeaserAttribute(): ?string {
        return (new PurifyAutolinkService())->getCleanTextWithLinks($this->teaser);
    }

    public function getTeaserMediumAttribute(): string {
        return Str::words($this->teaser ?? '', 20, '...');
        // return Str::limit($this->teaser, 200, '...');
    }

    public function getTeaserLightAttribute(): string {
        return Str::words($this->teaser ?? '', 9, '...');
        // return Str::limit($this->teaser, 55, '...');
    }

    public function getCreatedAttribute(): string {
        return $this->created_at?->format("d. m. Y");
    }

    public function getCreatedStringAttribute(): string {
        return $this->created_at?->format('Y');
    }

    public function getUpdatedAttribute(): string {
        return $this->updated_at?->format("d. m. Y");
    }

    public function getReadDurationAttribute(): int {
        return Str::readDurationWords($this->count_words);
    }

    public function setContentAttribute(?string $value): void {
        $plainText = Str::plainText($value);
        $this->attributes['content'] = $value;
        $this->attributes['content_plain'] = $plainText;
        $this->attributes['count_words'] = Str::wordCount($plainText);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class)->withTrashed();
    }

    public function document(): MorphMany {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionDocument);
    }

    public function album(): MorphMany {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionAlbum);
    }

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function toFeedItem(): FeedItem {
        return FeedItem::create()
            ->id("clanok/$this->id")
            ->image($this->getFirstMediaUrl('front_picture', 'large'))
            ->title($this->title)
            ->summary($this->teaser ?? '')
            ->updated($this->updated_at)
            ->link(route('article.show', $this->slug))
            ->authorName($this->user?->name)
            ->category($this->category?->title);
    }

    public static function getFeedItems(): Collection {
        return News::visible()->limit(100)->get();
    }

    public function registerMediaConversions(Media $media = null): void {
        if ($media?->collection_name == $this->collectionName) {
            $this->addMediaConversion('large')
                ->fit(Manipulations::FIT_CROP, 700, 400)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('small')
                ->fit(Manipulations::FIT_CROP, 370, 250)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('latest')
                ->fit(Manipulations::FIT_CROP, 80, 80)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 140, 80)
                ->sharpen(2)
                ->quality(60);
        } elseif ($media?->collection_name == $this->collectionAlbum) {
            $this->addMediaConversion('orginal')
                ->fit(Manipulations::FIT_MAX, 1280, 960)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('thumb')
                ->height(200)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 100, 100)
                ->sharpen(2)
                ->quality(60);
        }
    }
}
