<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // [
            //     'name' => 'Juan',
            //     'email' => 'juan_perez@gmail.com',
            //     'password' => Hash::make('portales'),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            //     'role' => 'admin'
            // ],
        ]);


        DB::table('user_tiene_recetarios')->insert([
            [
                'user_id' => 3,
                'recetario_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'recetario_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'recetario_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'recetario_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
