<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = Str::ucfirst($this->faker->words(6, true));
        $user_id = $this->faker->numberBetween(1,11);
        return [
            'active' => $this->faker->numberBetween(0,1),
            'user_id' => $user_id,
            'category_id' =>  $this->faker->numberBetween(1,7),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(5),
            'created_at'=> $this->faker->dateTimeBetween('-20 day', now()),
            'created_by' => $user_id,
            'updated_by' => $this->faker->numberBetween(1,11),
        ];
    }
}
