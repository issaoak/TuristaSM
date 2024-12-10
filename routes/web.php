<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InicioController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\VerificacionCorreoController;


Route::get('/', [InicioController::class, 'index'])->name('inicio');
//Rutas administrador

//Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/vuelos', [AdminController::class, 'vuelos'])->name('admin.vuelos');

Route::resource('admin/vuelos', VueloController::class)->names('admin.vuelos');
Route::resource('admin/destinos', DestinoController::class)->names('admin.destinos');
Route::resource('admin/hoteles', HotelController::class)->names('admin.hoteles');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/registro', [UsuarioController::class, 'mostrarRegistro'])->name('usuario.registro');
Route::post('/registro', [UsuarioController::class, 'registrar']);

Route::get('/iniciar-sesion', [UsuarioController::class, 'mostrarIniciarSesion'])->name('usuario.iniciar_sesion');
Route::post('/iniciar-sesion', [UsuarioController::class, 'procesarInicioSesion'])->name('login.post');
Route::get('admin/destinos', [DestinoController::class, 'index'])->name('admin.destinos.index');

//Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil');

Route::get('/admin', function () {
    // Verificar si el usuario tiene rol de administrador
    if (Auth::check() && Auth::user()->role === 'administrador') {
        return app(AdminController::class)->index();
    }
    abort(403, 'Acceso no autorizado'); // Mostrar error si no es administrador
})->name('admin.index');

// Ruta del perfil del usuario
Route::get('/perfil', function () {
    // Verificar si el usuario tiene rol de usuario
    if (Auth::check() && Auth::user()->role === 'usuario') {
        return app(UsuarioController::class)->perfil();
    }
    abort(403, 'Acceso no autorizado'); // Mostrar error si no es usuario
})->name('usuario.perfil');
//Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');
//Route::get('/perfil', [UsuarioController::class, 'perfil'])->middleware('auth')->name('usuario.perfil');


Route::get('/verificar', [UsuarioController::class, 'verificar'])->middleware('auth')->name('usuario.verificar');


// Ruta para manejar la verificación del correo
Route::get('/email/verify/{id}/{hash}', [VerificacionCorreoController::class, 'verificar'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

// Ruta para reenviar el enlace de verificación
Route::post('/email/verification-notification', [VerificacionCorreoController::class, 'reenviar'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
require __DIR__.'/auth.php';
