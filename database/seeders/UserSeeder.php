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
            [
                'id' => 1,
                'name' => 'Ana',
                'email' => 'ana_perez@io.com',
                'password' => Hash::make('portales'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'Juan',
                'email' => 'juan_lopez@gmail.com',
                'password' => Hash::make('portales'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'cliente'
            ],
          ]);


        DB::table('user_tiene_recetarios')->insert([
            [
                'user_id' => 2,
                'recetario_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
