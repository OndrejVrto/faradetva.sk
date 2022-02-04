<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{

    public function run()
    {
        $password = 'password';

        $user = User::create([
            'name' => 'Super Administrátor',
            'nick' => 'super-admin',
            'slug' => 'super-admin',
            'email' => 'super@admin.sk',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(1);  // Super Admin

        $user = User::create([
            'name' => 'Ondrej VRŤO',
            'nick' => 'DonOndrej',
            'slug' => Str::slug('Ondrej VRŤO'),
            'email' => 'ondrej@vrto.sk',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(2); // Admin

        $user = User::create([
            'name' => 'Marián Juhaniak',
            'nick' => 'majko',
            'slug' => Str::slug('Marián Juhaniak'),
            'email' => 'marian@juhaniak.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['3']); // Moderátor

        $user = User::create([
            'name' => 'Ľuboš Sabol',
            'nick' => 'lubos',
            'slug' => Str::slug('Ľuboš Sabol'),
            'email' => 'lubos@sabol.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['4']); // Moderátor

        $user = User::create([
            'name' => 'Pavol Prieboj',
            'nick' => 'Paľo',
            'slug' => Str::slug('Pavol Prieboj'),
            'email' => 'pavol@prieboj.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['4']); // Moderátor

        $user = User::create([
            'name' => 'Vladimír Kučera',
            'nick' => 'Vladko',
            'slug' => Str::slug('Vladimír Kučera'),
            'email' => 'vladimir@kucera.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['5']); // Akolyta

        $user = User::create([
            'name' => 'Eva Bohumeľová',
            'nick' => 'Evička',
            'slug' => Str::slug('Eva Bohumeľová'),
            'email' => 'eva@bohumelova.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['6']); // Lektor

        $user = User::create([
            'name' => 'Hosť',
            'nick' => 'guest',
            'slug' => Str::slug('Hosť'),
            'email' => 'guest@guest.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['7']); // Hosť

    }
}
