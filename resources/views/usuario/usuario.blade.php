@extends('layouts.usuario') <!-- Usa la plantilla específica para usuarios -->

@section('title', 'Perfil del Usuario') <!-- Define el título dinámico -->

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Perfil del Usuario</h1>
    <p class="text-center">A continuación, se muestra la información de tu perfil:</p>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ auth()->user()->nombre }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ auth()->user()->correo }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ auth()->user()->telefono }}</li>
    </ul>
    <div class="text-center mt-4">
        <!-- Botón para cerrar sesión -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
</div>
@endsection
