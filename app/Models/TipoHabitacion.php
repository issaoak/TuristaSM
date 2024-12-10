<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $table = 'tipos_habitacion'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación con hoteles.
     */
    public function hoteles()
    {
        return $this->hasMany(Hotel::class, 'id_tipo_habitacion');
    }
    //
}
