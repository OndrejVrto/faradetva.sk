<?php declare(strict_types=1);

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class File extends BaseModel implements HasMedia {
    use InteractsWithMedia;

    protected $table = 'files';

    public string $collectionName = 'attachment';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function source(): MorphOne {
        return $this->morphOne(Source::class, 'sourceable');
    }
}
