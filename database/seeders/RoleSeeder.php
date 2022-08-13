<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Pembeli',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Pedagang Kaki Lima',
            'guard_name' => 'web'
        ]);
    }
}
