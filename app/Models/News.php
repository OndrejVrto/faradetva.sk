<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Source;
use App\Models\Category;
use App\Traits\Restorable;
use App\Traits\Publishable;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use App\Services\PurifiAutolinkService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use Loggable;
    use Restorable;
    use HasFactory;
    use Publishable;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'news';

    public $collectionName = 'front_picture';

    public $collectionDocument = 'attachment';

    protected $fillable = [
        'active',
        'user_id',
        'published_at',
        'unpublished_at',
        'category_id',
        'title',
        'slug',
        'content',
        'teaser',
        'notified',
    ];

    protected $casts = [
        'active' => 'boolean',
        'notified' => 'boolean',
        'count_words' => 'integer',
        'content_plain' => 'string',
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
    ];

    protected $appends = [
        'read_duration',
    ];

    /* The number of models to return for pagination. */
    protected $perPage = 10;

    public function getRouteKeyName() {
        return 'slug';
    }

    public function scopeNewsComplete(Builder $query) {
        return $query
                    ->visible()
                    ->with('media', 'user', 'category', 'source')
                    ->paginate();
    }

    public function setTeaserAttribute($value) {
        $this->attributes['teaser'] = empty($value)
            ? Str::words($this->content_plain, 50)
            : $value;
    }

    public function getCleanTeaserAttribute() {
        return (new PurifiAutolinkService)->getCleanTextWithLinks($this->teaser);
    }

    public function getTeaserMediumAttribute() {
        return Str::words($this->teaser, 20, '...');
        // return Str::limit($this->teaser, 200, '...');
    }

    public function getTeaserLightAttribute() {
        return Str::words($this->teaser, 9, '...');
        // return Str::limit($this->teaser, 55, '...');
    }

    public function getCreatedAttribute() {
        return $this->created_at->format("d. m. Y");
    }

    public function getCreatedStringAttribute() {
        return $this->created_at->format('Y');
    }

    public function getUpdatedAttribute() {
        return $this->updated_at->format("d. m. Y");
    }

    public function getReadDurationAttribute() {
        return Str::readDurationWords($this->count_words);
    }

    public function setContentAttribute($value) {
        $plainText = Str::plainText($value);
        $this->attributes['content'] = $value;
        $this->attributes['content_plain'] = $plainText;
        $this->attributes['count_words'] = Str::wordCount($plainText);
    }

    public function user() {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category() {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTrashed();
    }

    public function document() {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionDocument);
    }

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function registerMediaConversions(Media $media = null) : void {
        if ($media->collection_name == $this->collectionName) {
            $this->addMediaConversion('large')
                ->fit(Manipulations::FIT_CROP, 848, 460)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('large-square')
                ->fit(Manipulations::FIT_CROP, 335, 290)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('large-thin')
                ->fit(Manipulations::FIT_CROP, 650, 300)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
            $this->addMediaConversion('thumb-latest-news')
                ->fit(Manipulations::FIT_CROP, 80, 80)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('thumb-all-news')
                ->fit(Manipulations::FIT_CROP, 370, 248)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 170, 92)
                ->sharpen(2)
                ->quality(60);
        }
    }
}
