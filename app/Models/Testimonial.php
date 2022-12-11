<?php declare(strict_types=1);

namespace App\Models;

use App\Traits\Activable;
use App\Traits\Restorable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends BaseModel implements HasMedia {
    use Loggable;
    use Activable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'testimonials';

    public string $collectionName = 'testimonial';

    protected $fillable = [
        'active',
        'name',
        'slug',
        'function',
        'description',
        'url',
        'deleted_at'
    ];

    protected $casts = [
        'active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    public function getMediaFileNameAttribute(): ?string {
        return $this->getFirstMedia($this->collectionName)?->file_name ?? null;
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('crop')
            ->fit(Manipulations::FIT_CROP, 120, 120)
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('crop-thumb')
            ->fit(Manipulations::FIT_CROP, 60, 60)
            ->sharpen(2)
            ->quality(60);
    }
}
