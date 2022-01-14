<?php

namespace App\Models;

use App\Traits\SlugFromTitle;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SlugFromTitle;
    use CreatedUpdatedBy;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function news() {
        return $this->hasMany(News::class);
    }
}
