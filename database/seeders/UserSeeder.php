<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void {

        $user = User::create([
            'name' => 'Super Administrátor',
            'nick' => 'super-admin',
            'slug' => Str::slug('Super Administrátor'),
            'email' => 'administrator@faradetva.sk',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_SUPER_ADMIN'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(1);  // Super Administrátor

        $user = User::create([
            'name' => 'Neznámy autor',
            'nick' => 'anonymous',
            'slug' => Str::slug('Neznámy autor'),
            'email' => 'noreply@faradetva.sk',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_ANONYMOUS'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(9); // Hosť

        $user = User::create([
            'name' => 'Demo',
            'nick' => 'demo',
            'slug' => Str::slug('Demo'),
            'email' => 'demo@faradetva.sk',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_DEMO'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(10); // demo

        $user = User::create([
            'name' => 'Ondrej VRŤO',
            'nick' => 'DonOndrej',
            'slug' => Str::slug('Ondrej VRŤO'),
            'email' => 'ondrej@vrto.sk',
            'can_be_impersonated' => 0,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_OV'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(2); // Administrátor

        $user = User::create([
            'name' => 'Marián Juhaniak',
            'nick' => 'majko',
            'slug' => Str::slug('Marián Juhaniak'),
            'email' => 'marian.juhaniak@faradetva.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_MJ'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['3']); // Moderátor

        $user = User::create([
            'name' => 'Pavol Prieboj',
            'nick' => 'pavel',
            'slug' => Str::slug('Pavol Prieboj'),
            'email' => 'pavol.prieboj@faradetva.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_PP'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['4']); // Redaktor

        $user = User::create([
            'name' => 'Ľuboš Sabol',
            'nick' => 'lubos',
            'slug' => Str::slug('Ľuboš Sabol'),
            'email' => 'lubos.sabol@faradetva.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_LS'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['5', '6']); // Kontrolór + Farské oznmy

        $user = User::create([
            'name' => 'Vladimír Kučera',
            'nick' => 'vladko',
            'slug' => Str::slug('Vladimír Kučera'),
            'email' => 'vladimir.kucera@faradetva.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_VK'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['7']); // Akolyta

        $user = User::create([
            'name' => 'Eva Bohumeľová',
            'nick' => 'evaB',
            'slug' => Str::slug('Eva Bohumeľová'),
            'email' => 'eva.bohumelova@faradetva.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_EB'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['8']); // Lektor

        $user = User::create([
            'name' => 'Ján Juriga',
            'nick' => 'Janko dé Dur',
            'slug' => Str::slug('Ján Juriga'),
            'email' => 'jan.juriga@faradetva.sk',
            'can_be_impersonated' => 1,
            'email_verified_at' => now(),
            'password' => env('PASSWORD_JJ'),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole(['9']); // Hosť

    }
}
