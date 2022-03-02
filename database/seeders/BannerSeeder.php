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
        ]);

        Banner::create([
            'title' => 'Spoločenstvá',
            'slug' => 'spolocenstva',
        ]);

        Banner::create([
            'title' => 'Články',
            'slug' => 'clanky',
        ]);

        Banner::create([
            'title' => 'Svedectvá',
            'slug' => 'svedectva',
        ]);

        Banner::create([
            'title' => 'Zmazať',
            'slug' => 'zmazat',
        ]);

        Banner::create([
            'title' => 'Udalosti',
            'slug' => 'udalosti',
        ]);

    }
}
