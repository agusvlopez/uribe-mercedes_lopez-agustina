<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //voy a crear recetarios:
        \DB::table('recetarios')->insert([
            [
                'id' => 1,
                'title' => 'Recetario General',
                'description' => ' El Recetario General es ideal para aquellos que desean llevar un estilo de vida activo y mantener una alimentación equilibrada y saludable. Con una amplia variedad de recetas sencillas y rápidas de hacer, sin dejar de ser ricas y nutritivas.',
                'price' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //anotar los otros recetarios(agus)
        ]);
    }
}
