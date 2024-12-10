@extends('layouts.usuario') <!-- Usaremos una plantilla específica para usuarios -->

@section('content')
<div class="container">
    <h1>Perfil del Usuario</h1>
    <p>Aquí puedes mostrar la información del perfil del usuario.</p>
    <ul>
        <li>Nombre: {{ auth()->user()->nombre }}</li>
        <li>Email: {{ auth()->user()->correo }}</li>
        <!-- Añade más información si es necesario -->
        <li>Teléfono: {{ auth()->user()->telefono }}</li>
    </ul>
</div>
@endsection
