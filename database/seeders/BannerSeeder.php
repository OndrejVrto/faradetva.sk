<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run()
    {
        Banner::create([
            'active'  => '1',
            'title' => 'Kňazi',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Spoločenstvá',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Články',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Svedectvá',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '0',
            'title' => 'Zmazať',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Udalosti',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

    }
}
