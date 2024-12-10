@extends('layouts.plantilla')

@section('titulo', 'Editar Vuelo')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Vuelo</h1>
    <form action="{{ route('admin.vuelos.update', $vuelo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="origen" class="form-label">Origen</label>
            <input type="text" class="form-control" id="origen" name="origen" value="{{ $vuelo->origen }}" required>
        </div>
        <div class="mb-3">
            <label for="id_destino" class="form-label">Destino</label>
            <select class="form-control" id="id_destino" name="id_destino" required>
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}" {{ $vuelo->id_destino == $destino->id ? 'selected' : '' }}>
                        {{ $destino->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Otros campos similares al formulario de creación -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
