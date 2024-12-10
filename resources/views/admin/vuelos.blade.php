@extends('layouts.plantilla')

@section('titulo', 'Gestión de Vuelos')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Gestión de Vuelos</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Regresar al Panel</a>
        <a href="{{ route('admin.vuelos.create') }}" class="btn btn-primary mb-3">Añadir Nuevo Vuelo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha Salida</th>
                <th>Fecha Llegada</th>
                <th>Precio</th>
                <th>Aerolínea</th>
                <th>Duración</th>
                <th>Capacidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo->origen }}</td>
                    <td>{{ $vuelo->id_destino }}</td>
                    <td>{{ $vuelo->fecha_salida }}</td>
                    <td>{{ $vuelo->fecha_llegada }}</td>
                    <td>{{ $vuelo->precio }}</td>
                    <td>{{ $vuelo->aerolinea }}</td>
                    <td>{{ $vuelo->duracion }} mins</td>
                    <td>{{ $vuelo->capacidad_max }}</td>
                    <td>{{ $vuelo->estado_vuelo }}</td>
                    <td>
                        <a href="{{ route('admin.vuelos.edit', $vuelo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.vuelos.destroy', $vuelo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este vuelo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
