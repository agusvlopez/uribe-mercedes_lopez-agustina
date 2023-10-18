<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //voy a crear recetarios:
        DB::table('recetarios')->insert([
            [
                'id' => 1,
                'title' => 'Recetario General',
                'description' => ' El Recetario General es ideal para aquellos que desean llevar un estilo de vida activo y mantener una alimentación equilibrada y saludable. Con una amplia variedad de recetas sencillas y rápidas de hacer, sin dejar de ser ricas y nutritivas.',
                'price' => 3500,
                'cover' => 'coversRecetario/recetario-general.jpg',
                'cover_description' => 'Varios platos con comidas diferentes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Recetario Infantil',
                'description' => 'El Recetario Infantil es la solución perfecta para padres y cuidadores que quieran fomentar la alimentación saludable en los mas chicos.',
                'price' => 2800,
                'cover' => 'coversRecetario/recetario-infantil.jpg',
                'cover_description' => 'Panqueques verdes con banana.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Recetario Vegetariano',
                'description' => 'El Recetario vegetariano está diseñado para quienes deseen tener ideas y explorar la cocina vegetariana, ofreciendo variedad de recetas deliciosas y equilibradas que son adecuadas para una dieta vegetariana y para aquellos que buscan incorporar más vegetales en su dieta. Desde platos clásicos reinventados hasta creaciones innovadoras, este recetario te inspirará a descubrir la riqueza de los ingredientes naturales.',
                'price' => 3300,
                'cover' => 'coversRecetario/recetario-vegetariano.jpg',
                'cover_description' => 'Chica con libro de recetas y con verduras.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
