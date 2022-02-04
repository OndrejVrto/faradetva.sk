<?php

namespace App\Traits;

use App\Models\User;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy() {
        if (!app()->runningInConsole() && auth()->check()) {

            $isAdmin = Self::isAdmin();

            static::creating(function ($model) use ($isAdmin) {
                if (!$model->isDirty('created_by')) {
                    $model->created_by = auth()->id();
                }
                if (!$isAdmin) {
                    if (!$model->isDirty('updated_by')) {
                        $model->updated_by = auth()->id();
                    }
                }
            });

            static::updating(function ($model) use ($isAdmin) {
                if (!$isAdmin) {
                    if (!$model->isDirty('updated_by')) {
                        $model->updated_by = auth()->id();
                    }
                }
            });
        }
    }

    public static function isAdmin() {
        return auth()->user()->roles->pluck('id')->contains(function ($value, $key) {
            //* id1 = SuperAdmin, id2 = Admin,  id3 = Moderator
            return $value <= 3;
        });
    }

    public function getCreatedInfoAttribute() {
        return date('d. m. Y \o H:i', strtotime($this->attributes['created_at']));
    }

    public function getUpdatedInfoAttribute() {
        return date('d. m. Y \o H:i', strtotime($this->attributes['updated_at']));
    }

    public function getCreatedByAttribute() {
        return User::whereId($this->attributes['created_by'])->value('name');
    }

    public function getUpdatedByAttribute() {
        return User::whereId($this->attributes['updated_by'])->value('name');
    }
}
