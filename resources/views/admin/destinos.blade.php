@extends('layouts.plantilla')

@section('titulo', 'Gestión de Destinos')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Gestión de Destinos</h1>

    {{-- Botón para regresar al panel principal o crear un nuevo destino --}}
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Regresar al Panel</a>
        <a href="{{ route('admin.destinos.create') }}" class="btn btn-primary">Nuevo Destino</a>
    </div>

    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla para listar los destinos --}}
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($destinos as $destino)
                <tr>
                    <td>{{ $destino->id }}</td>
                    <td>{{ $destino->nombre }}</td>
                    <td>{{ $destino->descripcion }}</td>
                    <td class="d-flex">
                        {{-- Botón para editar --}}
                        <a href="{{ route('admin.destinos.edit', $destino->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>

                        {{-- Botón para eliminar --}}
                        <form action="{{ route('admin.destinos.destroy', $destino->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este destino?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay destinos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
