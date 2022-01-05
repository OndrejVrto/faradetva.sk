<?php

namespace App\Models;

use App\Models\News;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens;
	use HasFactory;
	use Notifiable;
	use SoftDeletes;
	use HasRoles;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'nick',
        'email',
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the News for the User.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }



    public function adminlte_image()
    {
		// TODO Add user avatar
        return 'http://fara.detva.adminlte/images/avatars/'.$this->nick.'.svg';
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
