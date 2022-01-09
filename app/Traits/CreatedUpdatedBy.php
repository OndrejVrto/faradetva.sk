<?php

namespace App\Traits;

use App\Models\User;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        // parent::boot();
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });
    }

    public function getCreatedInfoAttribute()
    {
        return date('d. m. Y \o H:i', strtotime($this->created_at) );
    }

    public function getUpdatedInfoAttribute()
    {
        return date('d. m. Y \o H:i', strtotime($this->updated_at) );
    }

    public function getCreatedByAttribute($value)
    {
        $user = User::whereId($value)->first();
        return $user->name;
    }

    public function getUpdatedByAttribute($value)
    {
        $user = User::whereId($value)->first();
        return $user->name;
    }

}
