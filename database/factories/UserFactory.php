<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'role'=> fake() ->randomElement(['admin', 'author', 'viewer']),
            'remember_token' => Str::random(10),

            // 'user_id'           =>  $faker->randomDigit,
            // 'name'              =>  $faker->firstNameMale,
            // 'value_added_tax'   =>  $faker->randomDigit,
            // 'city'              =>  $faker->city,
            // 'zip_code'          =>  $faker->postcode,
            // 'country'           =>  $faker->country,
            // 'phone'             =>  $faker->phoneNumber,
            // 'img_src'           =>  $faker->imageUrl($width = 200, $height = 200)

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
