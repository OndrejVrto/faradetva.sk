<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$password = bcrypt('password');

		User::create([
			'name' => 'Super Admin',
			'nick' => 'super-admin',
            'email' => 'super@admin.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);

		User::create([
			'name' => 'Admin',
			'nick' => 'admin',
            'email' => 'admin@admin.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);

		User::create([
			'name' => 'User',
			'nick' => 'user',
            'email' => 'user@user.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);

		User::create([
			'name' => 'Guest',
			'nick' => 'guest',
            'email' => 'guest@guest.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);

		User::create([
			'name' => 'Ing. Ondrej VRŤO, IWE',
			'nick' => 'DonOndrej',
            'email' => 'ondrej@vrto.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);

    }
}
