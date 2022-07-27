<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class PermissionSeeder extends Seeder {
    public function run(): void {
        Artisan::call('permission:create-permission-routes');
    }
}
