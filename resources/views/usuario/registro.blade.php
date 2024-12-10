@extends('layouts.plantilla')

@section('titulo', 'Registro de Usuario')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Registro de Usuario</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('usuario.registro') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}">
            @error('apellido') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}">
            @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo') }}">
            @error('correo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" class="form-control">
            @error('contrasena') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="contrasena_confirmation">Confirmar Contraseña</label>
            <input type="password" id="contrasena_confirmation" name="contrasena_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Registrarse</button>
    </form>
</div>
@endsection
