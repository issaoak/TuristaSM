@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Perfil del Usuario</h1>
    <p>Aquí puedes mostrar la información del perfil del usuario.</p>
    <ul>
        <li>Nombre: {{ auth()->user()->name }}</li>
        <li>Email: {{ auth()->user()->email }}</li>
        <!-- Añade más información si es necesario -->
    </ul>
</div>
@endsection
