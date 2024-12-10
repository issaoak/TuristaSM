@extends('layouts.plantilla')

@section('titulo', 'Crear Vuelo')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Crear Vuelo</h1>
    <form action="{{ route('admin.vuelos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="origen" class="form-label">Origen</label>
            <input type="text" class="form-control" id="origen" name="origen" placeholder="Ciudad de origen" required>
        </div>
        <div class="mb-3">
            <label for="id_destino" class="form-label">Destino</label>
            <select class="form-control" id="id_destino" name="id_destino" required>
                <option value="">Seleccione un destino</option>
                <!-- Aquí se cargarían los destinos desde la base de datos -->
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}">{{ $destino->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_salida" class="form-label">Fecha de Salida</label>
            <input type="datetime-local" class="form-control" id="fecha_salida" name="fecha_salida" required>
        </div>
        <div class="mb-3">
            <label for="fecha_llegada" class="form-label">Fecha de Llegada</label>
            <input type="datetime-local" class="form-control" id="fecha_llegada" name="fecha_llegada" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" placeholder="Precio del vuelo" required>
        </div>
        <div class="mb-3">
            <label for="aerolinea" class="form-label">Aerolínea</label>
            <input type="text" class="form-control" id="aerolinea" name="aerolinea" placeholder="Nombre de la aerolínea" required>
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (en minutos)</label>
            <input type="number" class="form-control" id="duracion" name="duracion" placeholder="Duración del vuelo" required>
        </div>
        <div class="mb-3">
            <label for="id_tipo_vuelo" class="form-label">Tipo de Vuelo</label>
            <select class="form-control" id="id_tipo_vuelo" name="id_tipo_vuelo" required>
                <option value="">Seleccione un tipo de vuelo</option>
                <!-- Aquí se cargarían los tipos de vuelo desde la base de datos -->
                @foreach ($tipos_vuelo as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="capacidad_max" class="form-label">Capacidad Máxima</label>
            <input type="number" class="form-control" id="capacidad_max" name="capacidad_max" placeholder="Capacidad máxima del vuelo" required>
        </div>
        <div class="mb-3">
            <label for="estado_vuelo" class="form-label">Estado del Vuelo</label>
            <select class="form-control" id="estado_vuelo" name="estado_vuelo">
                <option value="activo">Activo</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
