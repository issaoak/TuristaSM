<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class TiposVueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_vuelo')->insert([
            ['nombre' => 'Nacional', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Internacional', 'created_at' => now(), 'updated_at' => now()],
        ]);

        //
    }
}
