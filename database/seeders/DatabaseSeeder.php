<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\NewsTag;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\TagTableSeeder;
use Database\Seeders\CategoriesTabSeeder;
use Database\Seeders\TestimonialTabSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

		User::create([
			'name' => 'Ing. Ondrej VRŤO, IWE',
            'email' => 'ondrej@vrto.sk',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ]);
		User::factory(10)->create();

		$this->call([
			TagTableSeeder::class,
			CategoriesTabSeeder::class,
			PriestTabSeeder::class,
			// TestimonialTabSeeder::class,
		]);

		News::factory(10)->create();
		NewsTag::factory(50)->create();
		Testimonial::factory(15)->create();

    }

}
