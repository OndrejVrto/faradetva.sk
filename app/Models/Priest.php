<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Priest extends Model implements HasMedia
{
    use Loggable;
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

    public function getRouteKeyName() {
        return 'slug';
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($priest) {
            $priest->slug = Str::slug( $priest->getFullNameWithTitles() );
        });

        static::updating(function ($priest) {
            $priest->slug = Str::slug( $priest->getFullNameWithTitles() );
        });
    }

    public function registerMediaConversions( Media $media = null ) : void {
        $this->addMediaConversion('crop')
            ->fit("crop", 230, 270);
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 60, 80);
    }

    public function getMediaFileNameAttribute() {
        return $this->getFirstMedia($this->collectionName)->file_name ?? null;
    }

    public function getFullNameTitlesAttribute () {
        return $this->getFullNameWithTitles();
    }

    public function getPhoneDigitsAttribute () {
        $remove_plus = preg_replace("/^\+/", "00", $this->phone );
        return preg_replace("/[^0-9]/", "", $remove_plus );
    }

    public function getFullNameAttribute () {
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
}

