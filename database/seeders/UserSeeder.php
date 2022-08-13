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
        $penjual =  User::create([
            'nama' => 'Pedagang Kaki Lima',
            'nama_dagang' => 'Kaki Lima Store',
            'lokasi' => 'DKI Jakarta',
            'email' => 'pedagang@email.tes',
            'password' => bcrypt('password'),
            'no_telp' => '0213456789',
            'profpict' => 'https://source.unsplash.com/random/200x200'
        ]);
        $penjual->assignRole('Pedagang Kaki Lima');

        $penjual2 =  User::create([
            'nama' => 'Pedagang Kaki Enam',
            'nama_dagang' => 'Kaki Enam Store',
            'lokasi' => 'Tangerang',
            'email' => 'kakienam@email.tes',
            'password' => bcrypt('password'),
            'no_telp' => '0213456789',
            'profpict' => 'https://source.unsplash.com/random/200x200'
        ]);
        $penjual2->assignRole('Pedagang Kaki Lima');

        $pembeli = User::create([
            'nama' => 'Pembeli',
            'lokasi' => 'DKI Jakarta',
            'email' => 'pembeli@email.tes',
            'password' => bcrypt('password'),
            'no_telp' => '0213456789',
            'profpict' => 'https://source.unsplash.com/random/200x200'
        ]);
        $pembeli->assignRole('Pembeli');
    }
}
