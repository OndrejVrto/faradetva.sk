<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{

    public function definition()
    {
        $title = Str::ucfirst($this->faker->words(6, true));
        $user_id = $this->faker->numberBetween(1,5);
        return [
            'active' => $this->faker->numberBetween(0,1),
            'user_id' => $user_id,
            'category_id' =>  $this->faker->numberBetween(1,7),
            'title' => $title,
            'slug' => Str::slug($title),
            'teaser' => $this->faker->paragraph(1),
            'content' => $this->faker->paragraph(5),
            'created_at'=> $this->faker->dateTimeBetween('-20 day', now()),
        ];
    }
}
