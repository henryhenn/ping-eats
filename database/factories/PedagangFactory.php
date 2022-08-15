<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedagang>
 */
class PedagangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
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
}
