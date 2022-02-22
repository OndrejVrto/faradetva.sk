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
            'slug' => 'knazi',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Spoločenstvá',
            'slug' => 'spolocenstva',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Články',
            'slug' => 'clanky',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Svedectvá',
            'slug' => 'svedectva',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '0',
            'title' => 'Zmazať',
            'slug' => 'zmazat',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

        Banner::create([
            'active'  => '1',
            'title' => 'Udalosti',
            'slug' => 'udalosti',
            'created_by' => rand(2,4),
            'updated_by' => rand(2,4),
        ]);

    }
}
