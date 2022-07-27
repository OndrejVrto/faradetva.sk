<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Restorable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseModel {
    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'deleted_at',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function news() {
        return $this->hasMany(News::class);
    }

    public function getTitleLightAttribute() {
        return Str::limit($this->title, 15, '...');
    }
}
