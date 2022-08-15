<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Akun Pembeli
        for ($i = 1; $i <= 50; $i++) {
            $users = User::create([
                'nama' => fake()->name(),
                'lokasi' => fake()->address(),
                'email' => fake()->safeEmail(),
                'password' => bcrypt('password'),
                'no_telp' => fake()->phoneNumber(),
                'profpict' => 'img/default_user.jpg'
            ]);
            $users->assignRole('Pembeli');
        }
    }
}
