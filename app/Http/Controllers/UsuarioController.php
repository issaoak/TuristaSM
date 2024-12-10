<?php

namespace App\Http\Controllers;

use App\Models\Usuario; // Modelo de usuario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function verificar()
    {
        return view('usuario.verificar'); // Carga la vista en 'resources/views/usuario/verificar.blade.php'
    }   

    /**
     * Display a listing of the resource.
     */
    public function perfil()
    {
        // Aquí puedes pasar datos del usuario autenticado, si es necesario
        $usuario = auth()->user(); // Obtiene al usuario autenticado
        return view('usuario.usuario', compact('usuario'));
    }

    public function mostrarIniciarSesion()
    {
        return view('usuario.iniciar_sesion'); // Asegúrate de que el nombre y ubicación de la vista sean correctos
    }
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
        Auth::login($usuario);

        $usuario->sendEmailVerificationNotification();


        return redirect()->route('usuario.verificar')->with('success', 'Usuario registrado correctamente.');
    }
}
