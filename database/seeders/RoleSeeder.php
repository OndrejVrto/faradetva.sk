<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void {
        $roleMaster = Role::create(['name' => 'Super Administrátor']);
        $roleMaster->givePermissionTo(Permission::all());

        $nameRoles = [
            'Administrátor' => [
                'admin.dashboard',
                'users.index',
            ],
            'Moderátor' => [
                'admin.dashboard',
            ],
            'Redaktor' => [
                'admin.dashboard'
            ],
            'Akolyta' => [
                'admin.dashboard',
            ],
            'Lektor' => [
                'admin.dashboard',
            ],
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
