@extends('layouts.plantilla')

@section('titulo', 'Editar Hotel')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Hotel</h1>
    <a href="{{ route('admin.hoteles.index') }}" class="btn btn-secondary mb-3">Regresar</a>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de edición --}}
    <form action="{{ route('admin.hoteles.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Hotel</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $hotel->nombre) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="id_destino">Destino</label>
            <select name="id_destino" id="id_destino" class="form-control" required>
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}" {{ $destino->id == $hotel->id_destino ? 'selected' : '' }}>{{ $destino->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="habitaciones_disponibles">Habitaciones Disponibles</label>
            <input type="number" name="habitaciones_disponibles" id="habitaciones_disponibles" class="form-control" value="{{ old('habitaciones_disponibles', $hotel->habitaciones_disponibles) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="precio">Precio por Noche</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ old('precio', $hotel->precio) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="calificacion">Calificación</label>
            <input type="number" step="0.01" name="calificacion" id="calificacion" class="form-control" value="{{ old('calificacion', $hotel->calificacion) }}">
        </div>

        <div class="form-group mt-3">
            <label for="id_tipo_habitacion">Tipo de Habitación</label>
            <select name="id_tipo_habitacion" id="id_tipo_habitacion" class="form-control" required>
                @foreach ($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id }}" {{ $tipo->id == $hotel->id_tipo_habitacion ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion', $hotel->descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
    </form>
</div>
@endsection
