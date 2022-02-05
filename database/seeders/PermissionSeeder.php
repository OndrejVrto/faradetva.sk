<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class PermissionSeeder extends Seeder
{
    public function run(): void {

        Artisan::call('permission:create-permission-routes');

        // $permissions = [
        //     'news,tags,categories,priests,testimonials,sliders,banners.*',
        //     'news,tags,categories,priests,testimonials.*',
        //     'news,tags,categories,priests,testimonials.index',
        // ];

        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }
    }
}
