<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Source extends BaseModel {
    protected $table = 'source';

    protected $fillable = [
        'source_description',
        'source_author',
        'source_author_url',
        'source_source',
        'source_source_url',
        'source_license',
        'source_license_url',
    ];

    public function getRouteKeyName(): string {
        return 'id';
    }

    public function sourceable(): MorphTo {
        return $this->morphTo();
    }

    public function getSourceDescriptionCropAttribute(): string {
        return Str::words($this->source_description, 10, '...');
    }
}
