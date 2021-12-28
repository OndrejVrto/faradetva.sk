<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$name = $this->faker->name();
		$faker = \Faker\Factory::create('sk_SK');

		return [
			'active'  => $this->faker->numberBetween(0,1),
			'name'  => $name,
			'slug'  => Str::slug($name),
			'function'  => $faker->jobTitle(),
			'description'  =>  $this->faker->words(25, true),
			'created_by' => $this->faker->numberBetween(1,11),
			'updated_by' => $this->faker->numberBetween(1,11),
		];

    }
}
