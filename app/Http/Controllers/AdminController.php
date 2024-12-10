<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'administrador') {
        return view('admin.index');
        }
        abort(403, 'Acceso no autorizado'); 

    }
    public function logout()
    {
        Auth::logout(); // Cierra la sesión del usuario
        request()->session()->invalidate(); // Invalida la sesión actual
        request()->session()->regenerateToken(); // Regenera el token CSRF por seguridad

        return redirect('/'); // Redirige a la página principal
    }

    public function vuelos()
    {
        return view('admin.vuelos');
    }

    public function hoteles()
    {
        return view('admin.hoteles');
    }

    public function destinos()
    {
        return view('admin.destinos');
    }
    //
}
