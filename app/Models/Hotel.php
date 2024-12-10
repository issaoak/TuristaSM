<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hoteles'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
        'id_destino',
        'habitaciones_disponibles',
        'precio',
        'calificacion',
        'id_tipo_habitacion',
        'descripcion',
    ];

    /**
     * Relación con el modelo Destino.
     */
    public function destino()
    {
        return $this->belongsTo(Destino::class, 'id_destino');
    }

    /**
     * Relación con el modelo TipoHabitacion.
     */
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'id_tipo_habitacion');
    }

    //
}
