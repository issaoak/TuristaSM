<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;


class DestinoController extends Controller
{
    public function index()
    {
        $destinos = Destino::all(); // Obtiene los destinos desde la base de datos
        return view('admin.destinos', compact('destinos')); // Envía la variable a la vista
    }

   

   

    // Mostrar formulario de creación
    public function create()
    {
        return view('admin.destinos_create'); // Nueva vista para crear
    }

    // Guardar un nuevo destino
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:destinos',
            'descripcion' => 'nullable|string',
        ]);

        Destino::create($request->all());

        return redirect()->route('admin.destinos.index')->with('success', 'Destino creado exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $destino = Destino::findOrFail($id);
        return view('admin.destinos_edit', compact('destino')); // Nueva vista para editar
    }

    // Actualizar un destino
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:destinos,nombre,' . $id,
            'descripcion' => 'nullable|string',
        ]);

        $destino = Destino::findOrFail($id);
        $destino->update($request->all());

        return redirect()->route('admin.destinos.index')->with('success', 'Destino actualizado exitosamente.');
    }

    // Eliminar un destino
    public function destroy($id)
    {
        $destino = Destino::findOrFail($id);
        $destino->delete();

        return redirect()->route('admin.destinos.index')->with('success', 'Destino eliminado exitosamente.');
    }



}
