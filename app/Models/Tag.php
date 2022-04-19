<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\News;
use App\Models\BaseModel;
use App\Traits\Restorable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends BaseModel
{
    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function news() {
        return $this->belongsToMany(News::class);
    }
}
