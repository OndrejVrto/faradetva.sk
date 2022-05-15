<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void {
            // id 1
        $roleMaster = Role::create(['name' => 'Super Administrátor']);
        $roleMaster->givePermissionTo(Permission::all());

        $nameRoles = [
            // id 2
            'Administrátor' => [
                'admin.dashboard',
                'users.index',
            ],
            // id 3
            'Moderátor' => [
                'admin.dashboard',
            ],
            // id 4
            'Redaktor' => [
                'admin.dashboard'
            ],
            // id 5
            'Kontrolór' => [
                'admin.dashboard',
            ],
            // id 6
            'Akolyta' => [
                'admin.dashboard',
            ],
            // id 7
            'Lektor' => [
                'admin.dashboard',
            ],
            // id 8
            'Hosť' => [
                'admin.dashboard',
            ],
        ];

        foreach ($nameRoles as $name => $permissions) {
            $role = Role::create(['name' => $name]);
            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        };
    }
}
