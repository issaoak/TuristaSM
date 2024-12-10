<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
