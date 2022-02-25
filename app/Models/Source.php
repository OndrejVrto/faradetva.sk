<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
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

    public function sourceable() {
        return $this->morphTo();
    }
}
