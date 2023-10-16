<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clasifications')->insert([

            [
                'clasification_id' => 1,
                'name' => 'Tips sobre alimentos',
            ],
            [
                'clasification_id' => 2,
                'name' => 'Recetas',
            ],
            [
                'clasification_id' => 3,
                'name' => 'Tips de organización',
            ],
            [
                'clasification_id' => 4,
                'name' => 'Mitos y verdades',
            ],

        ]);
    }
}
