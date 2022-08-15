<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        Akun Pedagang
        return [
            'nama' => fake()->name(),
            'nama_dagang' => fake()->name() . " Store",
            'lokasi' => fake()->address(),
            'email' => fake()->safeEmail(),
            'password' => bcrypt('password'),
            'no_telp' => fake()->phoneNumber(),
            'profpict' => 'img/default_user.jpg'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
