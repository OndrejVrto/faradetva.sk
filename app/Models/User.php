<?php

namespace App\Models;

use App\Models\News;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use InteractsWithMedia;

    protected $table = 'users';

    protected $fillable = [
        'nick',
        'email',
        'name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function registerMediaConversions( Media $media = null ) : void
    {
        $this->addMediaConversion('crop')
            ->fit("crop", 100, 100);
        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 40, 40);
    }

    public function adminlte_image()
    {
        return $this->getFirstMediaUrl('avatar', 'crop') ?: "http://via.placeholder.com/100x100";
    }

    public function adminlte_desc()
    {
        return $this->email;
    }

    public function adminlte_profile_url()
    {
        return route('users.show', $this->id);
    }

}
