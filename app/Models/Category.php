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
    use CreatedUpdatedBy;
    use SlugFromTitle;

    // LINK THIS MODEL TO OUR DATABASE TABLE
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
