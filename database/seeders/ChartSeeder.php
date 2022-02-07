<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Chart;
use Illuminate\Database\Seeder;

class ChartSeeder extends Seeder
{
    public function run(): void {
        Chart::create([
            'title' => 'Krsty',
            'description' => 'Vývoj počtu krstov',
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet krstov',
            'type_chart' => '1',
            'color' => '#217346',
        ]);

        Chart::create([
            'title' => 'Prvé sväté prijímanie',
            'description' => null,
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet',
            'type_chart' => '1',
            'color' => '#4BACC6',
        ]);

        Chart::create([
            'title' => 'Birmovanie',
            'description' => null,
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet birmovancov',
            'type_chart' => '1',
            'color' => '#ff7b33',
        ]);

        Chart::create([
            'title' => 'Sobáše',
            'description' => null,
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet sobášov',
            'type_chart' => '1',
            'color' => '#DA4D54',
        ]);

        Chart::create([
            'title' => 'Pohreby',
            'description' => null,
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet pohrebov',
            'type_chart' => '1',
            'color' => '#79CC42',
        ]);

        Chart::create([
            'title' => 'Sčítanie obyvateľov Detvy',
            'description' => 'Sčítanie obyvateľov (Štatistický úrad SR)',
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet obyvateľov',
            'type_chart' => '2',
            'color' => '#C0504D',
        ]);

        Chart::create([
            'title' => 'Sčítanie rímsko-katolíkov v meste Detva',
            'description' => 'Sčítanie obyvateľov (Štatistický úrad SR)',
            'name_x_axis' => 'Rok',
            'name_y_axis' => 'Počet katolíkov',
            'type_chart' => '2',
            'color' => '#8064A2',
        ]);
    }
}
