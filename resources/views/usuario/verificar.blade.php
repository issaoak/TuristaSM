@extends('layouts.plantilla')

@section('titulo', 'Verificación de Correo Electrónico')

@section('contenido')
<div class="container mt-5 text-center">
    <h1>¡Confirma tu Correo!</h1>
    <p>Te hemos enviado un enlace de verificación a tu correo electrónico. Haz clic en ese enlace para activar tu cuenta.</p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary mt-3">Reenviar Enlace</button>
    </form>
    @if (session('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
</div>
@endsection
