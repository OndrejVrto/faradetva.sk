<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Restorable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Prayer extends BaseModel implements HasMedia {
    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'prayers';

    public string $collectionName = 'prayer';

    protected $fillable = [
        'active',
        'name',
        'title',
        'slug',
        'quote_row1',
        'quote_row2',
        'quote_author',
        'quote_link_text',
        'quote_link_url',
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('extra-large')
            ->fit(Manipulations::FIT_CROP, 1920, 800)    // 1200px and up
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('large')
            ->fit(Manipulations::FIT_CROP, 1440, 600)    // 992px to 1200px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('medium')
            ->fit(Manipulations::FIT_CROP, 1200, 500)    // 768px to 992px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('small')
            ->fit(Manipulations::FIT_CROP, 960, 400)        // 576px to 768px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('extra-small')
            ->fit(Manipulations::FIT_CROP, 720, 300)        // less than 576px
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('crop-thumb')
            ->fit(Manipulations::FIT_CROP, 192, 80)
            ->sharpen(2)
            ->quality(60);
    }
}
