<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Entradas_BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //voy a crear recetarios:
         DB::table('entradas_blog')->insert([
            [
                'blog_id' => 1,
                'clasification_id' => 1,
                'title' => 'Frutas y Verduras de Estación',
                'content' => 'Las verduras, vegetales y frutas de estación, sobre todo si son agroecológicas, son más sabrosas, tienen un mejor color y tienen un mayor contenido de nutrientes. Esto es porque se respeta el ciclo natural de la planta y se utiliza más cantidad de abono natural y materia orgánica en su producción. ¡¡Elegilas todos los días en tu alimentación!! ',
                'author' => 'Ana Perez',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'blog_id' => 2,
                'clasification_id' => 1,
                'title' => 'Beneficios de consumir Garbanzos',
                'content' => 'Los garbanzos son legumbres con un sabor exquisito, que tienen alto contenido de proteínas de origen vegetal. Además son una excelente fuente de fibra, que contribuye con múltiples beneficios al organismo: provocan saciedad, regulan el tránsito intestinal entre otros. Son una buena fuente de Hierro, por lo que ayuda también en patologías como la anemia.',
                'author' => 'Ana Perez',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_id' => 3,
                'clasification_id' => 4,
                'title' => 'Contar calorías',
                'content' => 'Contar calorías sirve únicamente para las personas que trabajan con el tema, para las personas que arman planes de alimentación, para los nutricionistas, e incluso deportólogos. O bien, deportistas que están muy ligados a su entrenamiento y su rutina diaria y necesitan saber con más precisión las cantidades de su plan alimentario ',
                'author' => 'Ana Perez',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
