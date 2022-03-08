<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaticPage extends Model
{
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
}
