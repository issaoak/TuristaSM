@extends('layouts.plantilla')

@section('titulo', 'Nuevo Destino')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Nuevo Destino</h1>
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

    {{-- Formulario de creación --}}
    <form action="{{ route('admin.destinos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Destino</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{ old('descripcion') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
