<?php declare(strict_types=1);

namespace App\Models;

use App\Enums\PageType;
use App\Traits\Activable;
use App\Traits\Restorable;
use Illuminate\Http\Request;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StaticPage extends BaseModel implements HasMedia {
    use Activable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'static_pages';

    public string $collectionName = 'static_page_representing_image';

    protected $fillable = [
        'active',
        'virtual',
        'type_page',
        'title',
        'url',
        'slug',
        'route_name',
        'description_page',
        'keywords',
        'author_page',
        'header',
        'check_url',
        'teaser',
        'wikipedia',
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean',
        'virtual' => 'boolean',
        'check_url' => 'boolean',
        'deleted_at' => 'datetime',
        'type_page' => PageType::class,
    ];

    public function getFullUrlAttribute(): string {
        return strval(url($this->url));
    }

    public function scopeFilterDeactivated(Builder $query, Request $request): Builder {
        return $query
            ->when($request->has('only-deactivated'), function ($query) {
                $query->notActivated();
            });
    }

    public function scopeVirtual(Builder $query): Builder {
        return $query
            ->where('virtual', true);
    }

    public function scopeNotVirtual(Builder $query): Builder {
        return $query
            ->where('virtual', false);
    }

    public function files(): HasMany {
        return $this->hasMany(File::class);
    }

    public function banners(): BelongsToMany {
        return $this->belongsToMany(Banner::class, 'static_page_banner', 'static_page_id', 'banner_id');
    }

    public function faqs(): BelongsToMany {
        return $this->belongsToMany(Faq::class, 'static_page_faq', 'static_page_id', 'faq_id');
    }

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function picture(): MorphMany {
        return $this->morphMany(Media::class, 'model')->where('collection_name', $this->collectionName);
    }

    public function registerMediaConversions(Media $media = null): void {
        if ($media?->collection_name == $this->collectionName) {
            $this->addMediaConversion('crop-thumb')
                ->fit(Manipulations::FIT_CROP, 100, 50)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('representing')
                ->fit(Manipulations::FIT_CROP, 960, 480)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('representing-thumb')
                ->fit(Manipulations::FIT_CONTAIN, 256, 256)
                ->sharpen(2)
                ->quality(60);
            $this->addMediaConversion('card')
                ->fit(Manipulations::FIT_CROP, 370, 248)
                ->sharpen(2)
                ->quality(60)
                ->withResponsiveImages();
        }
    }
}
