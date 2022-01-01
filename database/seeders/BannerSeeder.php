<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Banner::create([
			'active'  => '1',
			'title' => 'Kňazi',
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
		]);

		Banner::create([
			'active'  => '1',
			'title' => 'Spoločenstvá',
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
		]);

		Banner::create([
			'active'  => '1',
			'title' => 'Články',
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
		]);

		Banner::create([
			'active'  => '1',
			'title' => 'Svedectvá',
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
		]);

		Banner::create([
			'active'  => '0',
			'title' => 'Zmazať',
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
		]);

		Banner::create([
			'active'  => '1',
			'title' => 'Udalosti',
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
		]);

    }
}
