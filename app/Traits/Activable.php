<?php declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Activable {
    public function scopeActivated(Builder $query): Builder {
        return $query
            ->where('active', true);
    }

    public function scopeNotActivated(Builder $query): Builder {
        return $query
            ->where('active', false);
    }
}
