<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UsuarioController;


Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//Rutas administrador
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/vuelos', [AdminController::class, 'vuelos'])->name('admin.vuelos');

Route::resource('admin/vuelos', VueloController::class)->names('admin.vuelos');
Route::resource('admin/destinos', DestinoController::class)->names('admin.destinos');
Route::resource('admin/hoteles', HotelController::class)->names('admin.hoteles');

Route::get('/registro', [UsuarioController::class, 'mostrarRegistro'])->name('usuario.registro');
Route::post('/registro', [UsuarioController::class, 'registrar']);

Route::get('admin/destinos', [DestinoController::class, 'index'])->name('admin.destinos.index');

require __DIR__.'/auth.php';
