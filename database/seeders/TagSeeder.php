<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Tag::create([
            'title' => 'Kostol',
            'description' => 'O kostole',
			'slug' => Str::slug('Kostol'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Oznamy',
            'description' => 'Farské oznamy',
			'slug' => Str::slug('Oznamy'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Dekanát',
            'description' => 'Oznamy z dekanátu',
			'slug' => Str::slug('Dekanát'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'História',
            'description' => 'Naša minulosť',
			'slug' => Str::slug('História'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Krst',
            'description' => 'Články súvisiace s krstom',
			'slug' => Str::slug('Krst'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Organ',
            'description' => 'Články o organe',
			'slug' => Str::slug('Organ'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Modlidba',
            'description' => 'Modlidba a rozjímanie',
			'slug' => Str::slug('Modlidba'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Kaplán',
            'description' => 'O našich kňazoch',
			'slug' => Str::slug('Kaplán'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Svadba',
            'description' => 'Svadobné veci',
			'slug' => Str::slug('Svadba'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);

		Tag::create([
            'title' => 'Pohreb',
            'description' => 'O veciach smrti',
			'slug' => Str::slug('Pohreb'),
			'created_by' => rand(1,11),
			'updated_by' => rand(1,11),
        ]);
    }
}
