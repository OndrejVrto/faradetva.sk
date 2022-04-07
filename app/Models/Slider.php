<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Source;
use App\Traits\Restorable;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia {

    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'sliders';

    public $collectionName = 'slider';

    protected $fillable = [
        'active',
        'heading_1',
        'heading_2',
        'heading_3',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function source() {
        return $this->morphOne(Source::class, 'sourceable');
    }

    public function registerMediaConversions( Media $media = null ) : void {
        $this->addMediaConversion('extra-large')
            ->fit("crop", 1920, 800)    // 1200px and up
            ->optimize();
        $this->addMediaConversion('large')
            ->fit("crop", 1440, 600)    // 992px to 1200px
            ->optimize();
        $this->addMediaConversion('medium')
            ->fit("crop", 1200, 500)    // 768px to 992px
            ->optimize();
        $this->addMediaConversion('small')
            ->fit("crop", 960, 400)        // 576px to 768px
            ->optimize();
        $this->addMediaConversion('extra-small')
            ->fit("crop", 720, 300)        // less than 576px
            ->optimize();
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 192, 80)
            ->optimize();
    }

    public function getFullHeadingAttribute() {
        return $this->fullHeading();
    }

    public function getTeaserAttribute() {
        return Str::words($this->fullHeading(), 30, '...');
    }

    public function getBreadcrumbTeaserAttribute() {
        return Str::words($this->fullHeading(), 6, '...');
    }

    private function fullHeading() {
        return  $this->heading_1
                . ' '
                .$this->heading_2
                . ' '
                .$this->heading_3;
    }
}
