<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Restorable;
use Spatie\Image\Manipulations;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia {
    use Loggable;
    use HasRoles;
    use Restorable;
    use HasFactory;
    use Notifiable;
    use Impersonate;
    use SoftDeletes;
    use HasApiTokens;
    use InteractsWithMedia;

    protected $table = 'users';

    public string $collectionName = 'avatar';

    protected $fillable = [
        'active',
        'nick',
        'phone',
        'email',
        'twitter_url',
        'facebook_url',
        'www_page_url',
        'name',
        'slug',
        'password',
        'can_be_impersonated',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'active'              => 'boolean',
        'can_be_impersonated' => 'boolean',
        'email_verified_at'   => 'datetime',
        'deleted_at'          => 'datetime',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function setPasswordAttribute(string $value): void {
        $this->attributes['password'] = bcrypt($value);
    }

    public function news(): HasMany {
        return $this->hasMany(News::class);
    }

    public function isAdmin(): bool {
        return $this->roles->pluck('id')->contains(function ($value, $key) {
            //* id1 = SuperAdmin, id2 = Admin,  id3 = Moderator
            return $value <= 3;
        });
    }

    public function canBeImpersonated(): bool {
        return $this->can_be_impersonated == 1;
    }

    public function adminlte_image(): string {
        return $this->getFirstMediaUrl($this->collectionName, 'crop') ?: "https://via.placeholder.com/100x100";
    }

    public function adminlte_desc(): string {
        return $this->email;
    }

    public function adminlte_profile_url(): string {
        return route('users.show', $this->slug);
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('crop')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->sharpen(2)
            ->quality(60);
        $this->addMediaConversion('crop-thumb')
            ->fit(Manipulations::FIT_CROP, 40, 40)
            ->sharpen(2)
            ->quality(60);
    }
}
