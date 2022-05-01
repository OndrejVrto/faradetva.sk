<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\BaseModel;

class Source extends BaseModel
{
    protected $table = 'source';

    protected $fillable = [
        'description',
        'author',
        'author_url',
        'source',
        'source_url',
        'license',
        'license_url',
    ];

    public function getRouteKeyName() {
        return 'id';
    }

    public function sourceable() {
        return $this->morphTo();
    }
}
