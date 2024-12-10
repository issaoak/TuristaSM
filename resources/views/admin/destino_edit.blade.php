@extends('layouts.plantilla')

@section('titulo', 'Editar Destino')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Destino</h1>
    <a href="{{ route('admin.destinos.index') }}" class="btn btn-secondary mb-3">Regresar</a>

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
    <form action="{{ route('admin.destinos.update', $destino->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Destino</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $destino->nombre) }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{ old('descripcion', $destino->descripcion) }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
    </form>
</div>
@endsection
