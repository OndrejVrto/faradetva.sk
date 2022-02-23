<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run()
    {
        Banner::create([
            'title' => 'Kňazi',
            'slug' => 'knazi',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'title' => 'Spoločenstvá',
            'slug' => 'spolocenstva',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'title' => 'Články',
            'slug' => 'clanky',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'title' => 'Svedectvá',
            'slug' => 'svedectva',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'title' => 'Zmazať',
            'slug' => 'zmazat',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'title' => 'Udalosti',
            'slug' => 'udalosti',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

    }
}
