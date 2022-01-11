<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Support\Str;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaticPage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $table = 'static_pages';

    protected $fillable = [
        'title',
        'url',
        'route_name',
        'description',
        'keywords',
        'author',
        'header'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug(Str::replace('/','-',$model->url));
        });

        static::updating(function ($model) {
            $model->slug = Str::slug(Str::replace('/','-',$model->url));
        });
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
