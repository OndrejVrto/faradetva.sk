<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder {
    public function run(): void {

        // TODO: description
        $categories = [
            'Bez kategórie' => 'Všetko čo sa nevošlo do inej kategórie',
            'Aktivity'      => '',
            'Dekanát'       => '',
            'Diecéza'       => '',
            'Farnosť'       => '',
            'Liturgia'      => '',
            'Oznamy'        => 'Oznamy, aktuality a správy.',
            'Rodina'        => '',
            'Viera a život' => '',
            'Zamyslenia'    => '',
        ];

        foreach ($categories as $key => $value) {
            Category::create([
                'title' => $key,
                'description' => $value,
                'slug' => Str::slug($key),
            ]);
        }
    }
}
