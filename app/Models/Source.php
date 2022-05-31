<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Support\Str;

class Source extends BaseModel
{
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

    public function getRouteKeyName() {
        return 'id';
    }

    public function sourceable() {
        return $this->morphTo();
    }

    public function getSourceDescriptionCropAttribute(){
        return Str::words($this->source_description, 10, '...');
    }
}
