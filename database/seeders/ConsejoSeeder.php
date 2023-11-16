<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsejoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consejos')->insert([
            [
                'consejo_id' => 1,
                'name' => 'Salud',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consejo_id' => 2,
                'name' => 'Alimentación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consejo_id' => 3,
                'name' => 'Receta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consejo_id' => 4,
                'name' => 'Deporte',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consejo_id' => 5,
                'name' => 'Recetas para Niños',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consejo_id' => 6,
                'name' => 'Viandas Saludables',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);


    }
}
