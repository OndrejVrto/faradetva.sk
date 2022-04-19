<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\BaseModel;

class DayIdea extends BaseModel
{
    protected $table = 'day_ideas';

    protected $fillable = [
        'author',
        'idea',
    ];

    public function getRouteKeyName() {
        return 'id';
    }
}
