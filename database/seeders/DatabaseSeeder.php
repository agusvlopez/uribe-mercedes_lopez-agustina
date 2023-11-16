<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // vamos a indicar qué seeders y en que orden queremos correr:
        $this->call(UserSeeder::class);
        $this->call(ConsejoSeeder::class);
        $this->call(RecetarioSeeder::class);
        $this->call(ClasificationSeeder::class);
        $this->call(Entradas_BlogsSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
