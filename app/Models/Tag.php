<?php declare(strict_types=1);

namespace App\Models;

use App\Traits\Restorable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends BaseModel {
    use Loggable;
    use Restorable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'deleted_at',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function news(): BelongsToMany {
        return $this->belongsToMany(News::class);
    }
}
