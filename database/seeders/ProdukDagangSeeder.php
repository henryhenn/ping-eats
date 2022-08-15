<?php

namespace Database\Seeders;

use App\Models\ProdukDagang;
use Illuminate\Database\Seeder;

class ProdukDagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            ProdukDagang::create([
                'nama' => 'Nasi Goreng',
                'harga' => fake()->randomNumber(5, true),
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
                'url_foto' => 'https://source.unsplash.com/random/400x200',
                'user_id' => fake()->numberBetween(51, 100)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            ProdukDagang::create([
                'nama' => 'Es Teh Manis',
                'harga' => fake()->randomNumber(5, true),
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
                'url_foto' => 'https://source.unsplash.com/random/400x200',
                'user_id' => fake()->numberBetween(51, 100)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            ProdukDagang::create([
                'nama' => 'Nasi Bakar',
                'harga' => fake()->randomNumber(5, true),
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
                'url_foto' => 'https://source.unsplash.com/random/400x200',
                'user_id' => fake()->numberBetween(51, 100)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            ProdukDagang::create([
                'nama' => 'Sate Ayam',
                'harga' => fake()->randomNumber(5, true),
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
                'url_foto' => 'https://source.unsplash.com/random/400x200',
                'user_id' => fake()->numberBetween(51, 100)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            ProdukDagang::create([
                'nama' => 'Sate Kambing',
                'harga' => fake()->randomNumber(5, true),
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
                'url_foto' => 'https://source.unsplash.com/random/400x200',
                'user_id' => fake()->numberBetween(51, 100)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            ProdukDagang::create([
                'nama' => 'Bakmie Ayam',
                'harga' => fake()->randomNumber(5, true),
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
                'url_foto' => 'https://source.unsplash.com/random/400x200',
                'user_id' => fake()->numberBetween(1, 50)
            ]);
        }
    }
}
