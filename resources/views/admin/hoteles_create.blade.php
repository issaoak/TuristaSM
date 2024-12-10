@extends('layouts.plantilla')

@section('titulo', 'Nuevo Hotel')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Nuevo Hotel</h1>
    <a href="{{ route('admin.hoteles.index') }}" class="btn btn-secondary mb-3">Regresar</a>

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de creación --}}
    <form action="{{ route('admin.hoteles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Hotel</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="id_destino">Destino</label>
            <select name="id_destino" id="id_destino" class="form-control" required>
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}">{{ $destino->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="habitaciones_disponibles">Habitaciones Disponibles</label>
            <input type="number" name="habitaciones_disponibles" id="habitaciones_disponibles" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="precio">Precio por Noche</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="calificacion">Calificación</label>
            <input type="number" step="0.1" name="calificacion" id="calificacion" class="form-control">
        </div>

        <div class="form-group mt-3">
            <label for="id_tipo_habitacion">Tipo de Habitación</label>
            <select name="id_tipo_habitacion" id="id_tipo_habitacion" class="form-control" required>
                @foreach ($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
