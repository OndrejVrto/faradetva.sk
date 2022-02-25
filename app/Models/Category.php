<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function news() {
        return $this->hasMany(News::class);
    }
}
