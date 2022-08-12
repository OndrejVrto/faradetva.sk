<?php declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Trait HasUuid
 * @package Jamesh\Uuid
 */
trait HasUuid {
    protected bool $isLockedUuid = true;

    /**
     * Get the primary key for the model.
     * UUID Identified primary key column
     */
    public function getKeyName(): string {
        return 'uuid';
    }

    /**
     * Used by Eloquent to get primary key type.
     * UUID Identified as a string.
     */
    public function getKeyType(): string {
        return 'string';
    }

    /**
     * Used by Eloquent to get if the primary key is auto increment value.
     * UUID is not.
     */
    public function getIncrementing(): bool {
        return false;
    }

    /**
     * Add behavior to creating and saving Eloquent events.
     */
    public static function bootHasUuid(): void {
        // Create a UUID to the model if it does not have one
        static::creating(function (Model $model) {
            $model->setKeyType('string');
            $model->setIncrementing(false);

            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = strval(Str::uuid());
            }
        });

        // Set original if someone try to change UUID on update/save existing model
        static::saving(function (Model $model) {
            $original_id = $model->getOriginal('id');
            if (!is_null($original_id) && $model->isLockedUuid && $original_id !== $model->id) {
                $model->id = $original_id;
            }
        });
    }
}
