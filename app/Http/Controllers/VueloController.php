<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use App\Models\Destino;
use App\Models\TipoVuelo;


use Illuminate\Http\Request;

class VueloController extends Controller
{
    public function index()
    {
        $vuelos = Vuelo::all(); // Obtener todos los vuelos
        return view('admin.vuelos', compact('vuelos'));
    }

    public function create()
    {
        $destinos = Destino::all(); // Obtener todos los destinos
        $tipos_vuelo = TipoVuelo::all(); // Obtener todos los tipos de vuelo
        return view('admin.vuelos_create', compact('destinos', 'tipos_vuelo'));    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required|max:150',
            'id_destino' => 'required|exists:destinos,id',
            'fecha_salida' => 'required|date',
            'fecha_llegada' => 'required|date|after:fecha_salida',
            'precio' => 'required|numeric|min:0',
            'aerolinea' => 'required|max:100',
            'duracion' => 'required|integer|min:0',
            'id_tipo_vuelo' => 'required|exists:tipos_vuelo,id',
            'capacidad_max' => 'required|integer|min:1',
            'estado_vuelo' => 'required|max:50',
        ]);

        Vuelo::create($request->all());

        return redirect()->route('admin.vuelos.index')->with('success', 'Vuelo creado exitosamente.');
    }

    public function edit(Vuelo $vuelo)
    {
        $destinos = Destino::all(); // Obtener todos los destinos
        $tipos_vuelo = TipoVuelo::all(); // Obtener todos los tipos de vuelo
        return view('admin.vuelos_edit', compact('vuelo', 'destinos', 'tipos_vuelo'));    }

    public function update(Request $request, Vuelo $vuelo)
    {
        $request->validate([
            'origen' => 'required|max:150',
            'id_destino' => 'required|exists:destinos,id',
            'fecha_salida' => 'required|date',
            'fecha_llegada' => 'required|date|after:fecha_salida',
            'precio' => 'required|numeric|min:0',
            'aerolinea' => 'required|max:100',
            'duracion' => 'required|integer|min:0',
            'id_tipo_vuelo' => 'required|exists:tipos_vuelo,id',
            'capacidad_max' => 'required|integer|min:1',
            'estado_vuelo' => 'required|max:50',
        ]);

        $vuelo->update($request->all());

        return redirect()->route('admin.vuelos.index')->with('success', 'Vuelo actualizado exitosamente.');
    }

    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();
        return redirect()->route('admin.vuelos.index')->with('success', 'Vuelo eliminado exitosamente.');
    }
}
