<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB


class TiposHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_habitacion')->insert([
            ['nombre' => 'Individual', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Doble', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Suite', 'created_at' => now(), 'updated_at' => now()],
        ]);
        //
    }
}
