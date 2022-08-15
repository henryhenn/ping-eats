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
        ProdukDagang::create([
            'nama' => 'Nasi Goreng',
            'harga' => 20000,
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
            'url_foto' => 'https://source.unsplash.com/random/400x200',
            'user_id' => fake()->numberBetween(1, 50)
        ]);

        ProdukDagang::create([
            'nama' => 'Es Teh Manis',
            'harga' => 12000,
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
            'url_foto' => 'https://source.unsplash.com/random/400x200',
            'user_id' => fake()->numberBetween(1, 50)
        ]);

        ProdukDagang::create([
            'nama' => 'Nasi Bakar',
            'harga' => 23000,
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
            'url_foto' => 'https://source.unsplash.com/random/400x200',
            'user_id' => fake()->numberBetween(1, 50)
        ]);

        ProdukDagang::create([
            'nama' => 'Sate Ayam',
            'harga' => 2000,
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima tempora quibusdam ipsum exercitationem perferendis alias asperiores maxime excepturi nam dolorum?',
            'url_foto' => 'https://source.unsplash.com/random/400x200',
            'user_id' => fake()->numberBetween(1, 50)
        ]);
    }
}
