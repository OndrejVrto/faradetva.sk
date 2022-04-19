<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\Restorable;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Priest extends BaseModel implements HasMedia
{
    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'priests';

    public $collectionName = 'priest';

    protected $fillable = [
        'active',
        'titles_before',
        'first_name',
        'last_name',
        'titles_after',
        'phone',
        'email',
        'function',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($priest) {
            $priest->slug = Str::slug( $priest->getFullNameWithTitles() );
        });

        static::updating(function ($priest) {
            $priest->slug = Str::slug( $priest->getFullNameWithTitles() );
        });
    }

    public function getFullNameTitlesAttribute() {
        return $this->getFullNameWithTitles();
    }

    public function getPhoneDigitsAttribute() {
        if(isset($this->phone)) {
            $remove_plus = preg_replace("/^\+/", "00", $this->phone );
            return preg_replace("/[^0-9]/", "", $remove_plus );
        }
        return;
    }

    public function getFullNameAttribute() {
        return $this->getFullName();
    }

    private function getFullNameWithTitles() {
        $name = isset($this->titles_before) ? $this->titles_before . ' ' : '';
        $name .= $this->getFullName();
        $name .= isset($this->titles_after) ? ', ' . $this->titles_after : '';

        return trim($name);
    }

    private function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function registerMediaConversions( Media $media = null ) : void {
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

