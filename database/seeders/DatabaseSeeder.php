<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\NewsTag;
use App\Models\Testimonial;
use Database\Seeders\TagSeeder;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\SliderSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\TestimonialSeeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Artisan::call('permission:create-permission-routes');

        $this->call(UserSeeder::class);
        User::factory(10)->create();

        $this->call([
            TagSeeder::class,
            CategoriesSeeder::class,
            PriestSeeder::class,
            TestimonialSeeder::class,
            SliderSeeder::class,
            BannerSeeder::class,

            // raw sql
            MediaSeeder::class,
            NewsSeeder::class,
        ]);

        News::factory(4)->create();
        NewsTag::factory(50)->create();
        Testimonial::factory(5)->create();

    }
}
