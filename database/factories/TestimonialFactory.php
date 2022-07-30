<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory {
    public function definition() {
        $name = $this->faker->name();
        $faker = \Faker\Factory::create('sk_SK');

        return [
            'active'  => $this->faker->numberBetween(0, 1),
            'name'  => $name,
            'slug'  => Str::slug($name),
            'function'  => $faker->jobTitle(),
            'description'  =>  $this->faker->words(25, true),
            'url'  =>  $this->faker->url(),
        ];
    }
}
