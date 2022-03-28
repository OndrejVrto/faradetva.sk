<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\File;
use App\Models\Banner;
use App\Traits\Restorable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaticPage extends Model
{
    use Restorable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'static_pages';

    protected $fillable = [
        'title',
        'url',
        'slug',
        'route_name',
        'description',
        'keywords',
        'author',
        'header',
        'check_url',
    ];

    protected $casts = [
        'check_url' => 'boolean',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function banners() {
        return $this->belongsToMany(Banner::class, 'static_page_banner', 'static_page_id', 'banner_id');
    }
}
