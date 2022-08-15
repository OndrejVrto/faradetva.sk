<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $firstName = $this->faker->firstName();
        $lastName  = $this->faker->unique()->lastName();
        $fullName  = $firstName.' '.$lastName;
        $email     = Str::slug($firstName).'.'.Str::slug($lastName).'@example.org';

        return [
            // id
            'active'              => $this->faker->boolean(80),
            'name'                => $fullName,
            'nick'                => Str::slug($firstName.'-'.$this->faker->numberBetween(10000, 99999)),
            'slug'                => Str::slug($fullName),
            'email'               => $email,
            'www_page_url'        => $this->faker->boolean(20) ? $this->faker->url() : null,
            'twitter_url'         => $this->faker->boolean(20) ? $this->faker->url() : null,
            'facebook_url'        => $this->faker->boolean(20) ? $this->faker->url() : null,
            'phone'               => $this->faker->boolean(40) ? $this->faker->phoneNumber() : null,
            'can_be_impersonated' => $this->faker->boolean(90),
            'email_verified_at'   => null,
            'password'            => 'password',
            'remember_token'      => Str::random(10),
            // 'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'password'            => $this->faker->password(8, 20),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified(): Factory {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
