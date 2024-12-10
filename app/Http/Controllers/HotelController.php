<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Destino;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoteles = Hotel::with('destino', 'tipoHabitacion')->get(); // Recupera hoteles con relaciones
        return view('admin.hoteles', compact('hoteles')); // Envía la variable a la vista
    }

    /**
     * Mostrar el formulario para crear un nuevo hotel.
     */
    public function create()
    {
        $destinos = Destino::all(); // Obtener todos los destinos
        $tiposHabitacion = TipoHabitacion::all(); // Obtener todos los tipos de habitación
        return view('admin.hoteles_create', compact('destinos', 'tiposHabitacion')); // Vista para crear hoteles
    }

    /**
     * Guardar un nuevo hotel en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:hoteles',
            'id_destino' => 'required|exists:destinos,id',
            'habitaciones_disponibles' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'calificacion' => 'nullable|numeric|min:1|max:5',
            'id_tipo_habitacion' => 'required|exists:tipos_habitacion,id',
            'descripcion' => 'nullable|string',
        ]);

        Hotel::create($request->all());

        return redirect()->route('admin.hoteles.index')->with('success', 'Hotel creado exitosamente.');
    }

    /**
     * Mostrar el formulario para editar un hotel.
     */
    public function edit(Hotel $hotel)
    {
        $destinos = Destino::all(); // Obtener todos los destinos
        $tiposHabitacion = TipoHabitacion::all(); // Obtener todos los tipos de habitación
        return view('admin.hoteles_edit', compact('hotel', 'destinos', 'tiposHabitacion'));
    }

    /**
     * Actualizar un hotel en la base de datos.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:hoteles,nombre,' . $hotel->id,
            'id_destino' => 'required|exists:destinos,id',
            'habitaciones_disponibles' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'calificacion' => 'nullable|numeric|min:1|max:5',
            'id_tipo_habitacion' => 'required|exists:tipos_habitacion,id',
            'descripcion' => 'nullable|string',
        ]);

        $hotel->update($request->all());

        return redirect()->route('admin.hoteles.index')->with('success', 'Hotel actualizado exitosamente.');
    }

    /**
     * Eliminar un hotel.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('admin.hoteles.index')->with('success', 'Hotel eliminado exitosamente.');
    }
}
