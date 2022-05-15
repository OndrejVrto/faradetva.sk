<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void {
        Category::create([
            'title' => 'Bez kategórie',
            'description' => 'Všetko čo sa nevošlo do inej kategórie',
            'slug' => Str::slug('Bez kategórie'),
        ]);

        Category::create([
            'title' => 'Viera a život',
            'description' => 'O kostole',
            'slug' => Str::slug('Viera a život'),
        ]);

        Category::create([
            'title' => 'Kňaz a Boh',
            'description' => 'Kategória o svädskom živote v cirkvi.',
            'slug' => Str::slug('Kňaz a Boh'),
        ]);

        Category::create([
            'title' => 'Biblia',
            'description' => 'Kánonické právo, nový a strý zákon.',
            'slug' => Str::slug('Biblia'),
        ]);

        Category::create([
            'title' => 'Kázeň',
            'description' => 'Slová vypovedané pred veriacimi v textovej podobe.',
            'slug' => Str::slug('Kázeň'),
        ]);

        Category::create([
            'title' => 'Oznamy',
            'description' => 'Oznamy, aktuality a správy.',
            'slug' => Str::slug('Oznamy'),
        ]);

        Category::create([
            'title' => 'História',
            'description' => 'Naše dejiny a zaujímavosti.',
            'slug' => Str::slug('História'),
        ]);
    }
}
