<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

		// Super Admin
		$role = Role::create(['name' => 'Super Admin']);
		$role->givePermissionTo(Permission::all());
		// $permissions = Permission::pluck('id','id')->all();
		// $role->syncPermissions($permissions);
		$user = User::create([
			'name' => 'Super Admin',
			'nick' => 'super-admin',
            'email' => 'super@admin.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
		$user->assignRole([$role->id]);

		// Admin
		$role = Role::create(['name' => 'Admin']);
		Permission::findOrCreate('news,tags,categories,priests,testimonials,sliders,banners.*');
		$role->givePermissionTo([
			'news,tags,categories,priests,testimonials,sliders,banners.*',
			'users.index',
			'admin.dashboard'
		]);
		$user = User::create([
			'name' => 'Admin',
			'nick' => 'admin',
            'email' => 'admin@admin.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
		$user->assignRole([$role->id]);

		// User
		$role = Role::create(['name' => 'User']);
		Permission::findOrCreate('news,tags,categories,priests,testimonials.*');
		$role->givePermissionTo([
			'news,tags,categories,priests,testimonials.*',
			'admin.dashboard'
		]);
		$user = User::create([
			'name' => 'User',
			'nick' => 'user',
            'email' => 'user@user.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
		$user->assignRole([$role->id]);

		// User
		$role = Role::create(['name' => 'Guest']);
		Permission::findOrCreate('news,tags,categories,priests,testimonials.index');
		$role->givePermissionTo([
			'news,tags,categories,priests,testimonials.index',
			'admin.dashboard'
		]);
		$user = User::create([
			'name' => 'Guest',
			'nick' => 'guest',
            'email' => 'guest@guest.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
		$user->assignRole([$role->id]);

		$role = Role::create(['name' => 'Akolyta']);
		$role->givePermissionTo('admin.dashboard');
		User::create([
			'name' => 'Ing. Ondrej VRŤO, IWE',
			'nick' => 'DonOndrej',
            'email' => 'ondrej@vrto.sk',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10)
        ]);
		$user->assignRole([$role->id]);

    }
}
