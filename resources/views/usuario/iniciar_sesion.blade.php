@extends('layouts.plantilla')

@section('titulo', 'Iniciar Sesión')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Iniciar Sesión</h1>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" required>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first('correo') }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
    </form>
</div>
@endsection
