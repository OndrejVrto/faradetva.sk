<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void {
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
        $user->assignRole(1);  // Super Administrátor

        $user = User::create([
            'name' => 'Neznámy autor',
            'nick' => 'anonymous',
            'slug' => Str::slug('Neznámy autor'),
            'email' => 'anonymous@example.com',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(8); // Hosť

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
        $user->assignRole(2); // Administrátor

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
            'name' => 'Pavol Prieboj',
            'nick' => 'Paľo',
            'slug' => Str::slug('Pavol Prieboj'),
            'email' => 'pavol@prieboj.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['4']); // Redaktor

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
        $user->assignRole(['5']); // Kontrolór

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
        $user->assignRole(['6']); // Akolyta

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
        $user->assignRole(['7']); // Lektor

        $user = User::create([
            'name' => 'Ján Juriga',
            'nick' => 'Janko dé Dur',
            'slug' => Str::slug('Ján Juriga'),
            'email' => 'jan@juriga.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['8']); // Hosť

    }
}
