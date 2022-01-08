<?php

namespace App\Models;

use App\Models\News;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
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

    public function news()
    {
        return $this->hasMany(News::class);
    }


	public function registerMediaConversions( Media $media = null ) : void
	{
		$this->addMediaConversion('crop')
			->fit("crop", 100, 100);
	}


	public function getMediaFileNameAttribute()
	{
		return $this->getFirstMedia('avatar')->file_name ?? null;
	}


    public function adminlte_image()
    {
		// TODO   N+1 Query
		return $this->getFirstMediaUrl('avatar', 'crop') ?: "http://via.placeholder.com/100x100";
    }

    public function adminlte_desc()
    {
        return $this->email;
    }

    public function adminlte_profile_url()
    {
		// TODO Route to user profil
		// TODO Create Form - change user password

        return 'admin.dashboard';
    }

}
