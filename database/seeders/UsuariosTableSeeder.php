<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB
use Illuminate\Support\Facades\Hash;


class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Mateo',
            'apellido' => 'Ruiz',
            'telefono' => '1234567890',
            'correo' => 'mateo.ruiz@admin.com',
            'contrasena' => Hash::make('admin123'), // Contraseña hasheada
            'role' => 'administrador',
            'fecha_registro' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //
    }
}
