<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{

    public function run()
    {

        Category::create([
            'title' => 'Bez kategórie',
            'description' => 'Všetko čo sa nevošlo do inej kategórie',
            'slug' => Str::slug('Bez kategórie'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Category::create([
            'title' => 'Viera a život',
            'description' => 'O kostole',
            'slug' => Str::slug('Viera a život'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Category::create([
            'title' => 'Kňaz a Boh',
            'description' => 'Kategória o svädskom živote v cirkvi.',
            'slug' => Str::slug('Kňaz a Boh'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Category::create([
            'title' => 'Biblia',
            'description' => 'Kánonické právo, nový a strý zákon.',
            'slug' => Str::slug('Biblia'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Category::create([
            'title' => 'Kázeň',
            'description' => 'Slová vypovedané pred veriacimi v textovej podobe.',
            'slug' => Str::slug('Kázeň'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Category::create([
            'title' => 'Oznamy',
            'description' => 'Oznamy, aktuality a správy.',
            'slug' => Str::slug('Oznamy'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Category::create([
            'title' => 'História',
            'description' => 'Naše dejiny a zaujímavosti.',
            'slug' => Str::slug('História'),
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

    }
}
