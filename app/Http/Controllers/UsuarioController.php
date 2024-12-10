<?php

namespace App\Http\Controllers;

use App\Models\User; // Modelo de usuario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarRegistro()
    {
        return view('usuario.registro');
    }

    // Procesa el registro de usuarios
    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'apellido' => 'required|string|max:150',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:usuarios,correo|max:255',
            'contrasena' => 'required|string|min:8|confirmed',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->contrasena = Hash::make($request->contrasena);
        $usuario->role = 'usuario'; // Valor predeterminado
        $usuario->save();

        return redirect()->route('usuario.registro')->with('success', 'Usuario registrado correctamente.');
    }
}
