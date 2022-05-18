<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\News;
use App\Models\User;
use App\Models\Testimonial;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\FileSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ChartSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\RawSqlSeeder;
use Database\Seeders\SliderSeeder;
use Database\Seeders\DayIdeaSeeder;
use Database\Seeders\ChartDataSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\SearchConfigSeeder;
use Database\Seeders\UserRolePermissionsSeeder;

class DatabaseSeeder extends Seeder
{
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
            ChartSeeder::class,
            ChartDataSeeder::class,
            TagSeeder::class,
            CategoriesSeeder::class,
            PriestSeeder::class,
            SliderSeeder::class,

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
