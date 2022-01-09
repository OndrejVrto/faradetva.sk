<?php

namespace App\Traits;

use App\Models\User;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy() {
        // parent::boot();
        // updating createdBy and updatedBy when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id;
            }
            if (!$model->isDirty('update_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // updating updatedBy when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });
    }

    public function getCreatedInfoAttribute() {
        return date('d. m. Y \o H:i', strtotime($this->attributes['created_at']));
    }

    public function getUpdatedInfoAttribute() {
        return date('d. m. Y \o H:i', strtotime($this->attributes['updated_at']));
    }

    public function getCreatedByAttribute() {
        return User::whereId($this->attributes['created_by'])->first()->name;
    }

    public function getUpdatedByAttribute() {
        return User::whereId($this->attributes['updated_by'])->first()->name;
    }
}
