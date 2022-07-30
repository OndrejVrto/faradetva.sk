<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            // START USERs
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // UserRolePermissionsSeeder::class,

            // RAW
            RawSqlSeeder::class,

            // OTHER
                // ChartSeeder::class,
                // ChartDataSeeder::class,
                // TagSeeder::class,
                // CategoriesSeeder::class,
                // PriestSeeder::class,

            // SliderSeeder::class,
            // DayIdeaSeeder::class,
            // SearchConfigSeeder::class,
            // StaticPageSeeder::class,
            // TestimonialSeeder::class,
            // FileSeeder::class,
            // BannerSeeder::class,
            // NewsSeeder::class,
            // MediaSeeder::class,
        ]);
    }
}
