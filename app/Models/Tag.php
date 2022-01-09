<?php

namespace App\Models;

use App\Models\News;
use App\Traits\SlugFromTitle;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;
    use SlugFromTitle;

    protected $fillable = [
        'title',
        'description'
    ];

    public function news() {
        return $this->belongsToMany(News::class);
    }
}
