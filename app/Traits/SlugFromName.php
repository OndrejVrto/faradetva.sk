<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SlugFromName
{
    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
