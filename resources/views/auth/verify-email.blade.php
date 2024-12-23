@extends('layouts.plantilla')

@section('titulo', 'Verificar Correo')

@section('contenido')
<div class="container mt-5 text-center">
    <h1>¡Verifica tu Correo Electrónico!</h1>
    <p>Hemos enviado un enlace de verificación a tu correo electrónico. Haz clic en el enlace para activar tu cuenta.</p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Reenviar Enlace de Verificación</button>
    </form>
    @if (session('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
</div>
@endsection
