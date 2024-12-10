@extends('layouts.plantilla')

@section('titulo', 'Gestión de Hoteles')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Gestión de Hoteles</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">Regresar al Panel</a>
        <a href="{{ route('admin.hoteles.create') }}" class="btn btn-primary mb-3">Nuevo Hotel</a>
    </div>


    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Destino</th>
                <th>Tipo Habitación</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hoteles as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->nombre }}</td>
                    <td>{{ $hotel->destino->nombre }}</td>
                    <td>{{ $hotel->tipoHabitacion->nombre }}</td>
                    <td>{{ $hotel->precio }}</td>
                    <td>
                        <a href="{{ route('admin.hoteles.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.hoteles.destroy', $hotel->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este hotel?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay hoteles registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
