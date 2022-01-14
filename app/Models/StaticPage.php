<?php

namespace App\Models;

use App\Models\File;
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
        'slug',
        'route_name',
        'description',
        'keywords',
        'author',
        'header',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
