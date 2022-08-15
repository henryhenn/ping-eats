<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pedagang;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(ProdukDagangSeeder::class);

        foreach (Role::where('name', 'Pembeli')->get() as $role) {
            $pembeli = User::factory(50)->create();
            foreach ($pembeli as $user) {
                $user->assignRole('Pembeli');
            }
        }

        foreach (Role::where('name', 'Pedagang Kaki Lima')->get() as $role) {
            $penjual = User::factory(50)->create();
            foreach ($penjual as $user) {
                $user->assignRole('Pedagang Kaki Lima');
            }
        }
    }
}
