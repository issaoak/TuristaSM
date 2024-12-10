<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CrearUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'telefono' => '5544332211',
            'correo' => 'juan.perez@usuario.com',
            'contrasena' => Hash::make('usuario123'), // Contraseña hasheada
            'role' => 'usuario',
            'fecha_registro' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //
    }
}
