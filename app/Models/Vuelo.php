<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Vuelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'origen',
        'id_destino',
        'fecha_salida',
        'fecha_llegada',
        'precio',
        'aerolinea',
        'duracion',
        'id_tipo_vuelo',
        'capacidad_max',
        'estado_vuelo',
    ];
}
