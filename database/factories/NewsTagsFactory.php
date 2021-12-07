<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

		return [
			'news_id' =>  $this->faker->numberBetween(1, 10),
			'tags_id' =>  $this->faker->numberBetween(1, 10)
		];

	}
}
