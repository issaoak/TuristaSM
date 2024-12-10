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
        // Verificar si el usuario autenticado es un usuario normal
        if (Auth::check() && Auth::user()->role === 'usuario') {
            $usuario = Auth::user(); // Obtener datos del usuario autenticado
            return view('usuario.usuario', compact('usuario')); // Vista para el usuario
        }
        abort(403, 'Acceso no autorizado'); // Si no es usuario, denegar acceso
    }
    public function mostrarIniciarSesion()
    {
        return view('usuario.iniciar_sesion'); // Asegúrate de que el nombre y ubicación de la vista sean correctos
    }





    public function mostrarRegistro()
    {
        return view('usuario.registro');
    }
    public function procesarInicioSesion(Request $request)
{
    $request->validate([
        'correo' => 'required|email',
        'contrasena' => 'required|string|min:8',
    ]);

    if (Auth::attempt(['correo' => $request->correo, 'password' => $request->contrasena])) {
        $request->session()->regenerate();

        // Redirigir según el rol del usuario
        $usuario = Auth::user();
        if ($usuario->role === 'administrador') {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('usuario.perfil');
        }
    }

    return back()->withErrors([
        'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
}
public function logout()
{
    Auth::logout(); // Cierra la sesión del usuario
    return redirect('/'); // Redirige a la página de inicio
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
