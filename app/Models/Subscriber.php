<?php

declare(strict_types = 1);

namespace App\Models;

use App\Traits\HasUuid;
use App\Models\BaseModel;
use Illuminate\Support\Str;
use App\Mail\VerificationEmailMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Subscriber extends BaseModel
{
    use HasUuid;
    use Loggable;
    use SoftDeletes;

    protected $table = 'subscribers';

    protected $fillable = [
        'name',
        'email',
        'model_type',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName() {
        return 'id';
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->unsubscribe_token = Str::random(32);
            $model->verified_token = Str::random(32);
        });

        static::created(function ($model) {
            Mail::to($model->email)->send(new VerificationEmailMail($model));
            // Log::debug('Poslať na mail '.$model->email . ' token ' . $model->verified_token);
        });
    }
}
