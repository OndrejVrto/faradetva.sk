<?php declare(strict_types=1);

namespace App\Models;

use App\Traits\Activable;
use App\Traits\Restorable;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Priest extends BaseModel implements HasMedia {
    use Loggable;
    use Activable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'priests';

    public string $collectionName = 'priest';

    protected $fillable = [
        'active',
        'titles_before',
        'first_name',
        'last_name',
        'titles_after',
        'phone',
        'email',
        'twitter_url',
        'facebook_url',
        'www_page_url',
        'function',
        'description',
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    protected static function boot(): void {
        parent::boot();

        static::creating(function ($priest): void {
            $priest->slug = Str::slug($priest->getFullNameWithTitles());
        });

        static::updating(function ($priest): void {
            $priest->slug = Str::slug($priest->getFullNameWithTitles());
        });
    }

    public function getFullNameTitlesAttribute(): string {
        return $this->getFullNameWithTitles();
    }

    public function getPhoneDigitsAttribute(): ?string {
        if (property_exists($this, 'phone') && $this->phone !== null) {
            return preg_replace(
                pattern: ["/\+/", "/[^0-9]/"],
                replacement: ["00", ""],
                subject: (string) $this->phone
            );
        }
        return null;
    }

    public function getFullNameAttribute(): string {
        return $this->getFullName();
    }

    private function getFullNameWithTitles(): string {
        $name = property_exists($this, 'titles_before') && $this->titles_before !== null ? $this->titles_before . ' ' : '';
        $name .= $this->getFullName();
        $name .= property_exists($this, 'titles_after') && $this->titles_after !== null ? ', ' . $this->titles_after : '';

        return trim($name);
    }

    private function getFullName(): string {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('crop')
            ->fit(Manipulations::FIT_CROP, 230, 270)
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('crop-thumb')
            ->fit(Manipulations::FIT_CROP, 60, 80)
            ->sharpen(2)
            ->quality(60);
    }
}
