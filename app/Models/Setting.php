<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Setting extends Model
{
    use Loggable;

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value'
    ];

    public $timestamps = false;

    static public $settings = null;

    static function get($key, $default = null) {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        $model = self
            ::$settings
            ->where('key', $key)
            ->first();
        if (empty($model)) {
            if (empty($default)) {
                //Throw an exception, you cannot resume without the setting.
                throw new \Exception('Cannot find setting: '.$key);
            } else {
                return $default;
            }
        } else {
            return $model->value;
        }
    }

    static function set(string $key, $value): bool {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        if (is_string($value) || is_int($value)) {
            $model = self
                ::$settings
                ->where('key', $key)
                ->first();

            if (empty($model)) {
                $model = self::create([
                    'key' => $key,
                    'value' => $value
                ]);
                self::$settings->push($model);
            } else {
                $model->update(compact('value'));
            }
            return true;
        } else {
            return false;
        }
    }
}
