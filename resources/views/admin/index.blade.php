@extends('layouts.plantilla')

@section('titulo', 'Panel de Administración')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Panel de Administración</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Vuelos</h5>
                    <p class="card-text">Gestión de vuelos disponibles.</p>
                    <a href="{{ route('admin.vuelos.index') }}" class="btn btn-primary">Ir a Vuelos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Hoteles</h5>
                    <p class="card-text">Gestión de hoteles y reservas.</p>
                    <a href="{{ route('admin.hoteles.index') }}" class="btn btn-primary">Ir a Hoteles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Destinos</h5>
                    <p class="card-text">Gestión de destinos turísticos.</p>
                    <a href="{{ route('admin.destinos.index') }}" class="btn btn-primary">Ir a Destinos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
