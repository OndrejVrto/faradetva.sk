<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\News;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Loggable;
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use Impersonate;
    use SoftDeletes;
    use HasApiTokens;
    use InteractsWithMedia;

    protected $table = 'users';

    public $collectionName = 'avatar';

    protected $fillable = [
        'active',
        'nick',
        'email',
        'name',
        'slug',
        'password',
        'can_be_impersonated',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'active' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function news() {
        return $this->hasMany(News::class);
    }

    public function isAdmin() {
        return $this->roles->pluck('id')->contains(function ($value, $key) {
            //* id1 = SuperAdmin, id2 = Admin,  id3 = Moderator
            return $value <= 3;
        });
    }

    public function canBeImpersonated() {
        return $this->can_be_impersonated == 1;
    }

    public function registerMediaConversions( Media $media = null ) : void {
        $this->addMediaConversion('crop')
            ->fit("crop", 100, 100);
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 40, 40);
    }

    public function adminlte_image() {
        return $this->getFirstMediaUrl($this->collectionName, 'crop') ?: "http://via.placeholder.com/100x100";
    }

    public function adminlte_desc() {
        return $this->email;
    }

    public function adminlte_profile_url() {
        return route('users.show', $this->id);
    }
}
