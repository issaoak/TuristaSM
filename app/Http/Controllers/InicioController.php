<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('inicio'); // Retorna la vista de inicio
    }
    //
}
