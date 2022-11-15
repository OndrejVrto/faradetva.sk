<?php declare(strict_types=1);

namespace App\Models;

class DayIdea extends BaseModel {
    protected $table = 'day_ideas';

    protected $fillable = [
        'author',
        'idea',
    ];

    public function getRouteKeyName() {
        return 'id';
    }
}
