<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TipoVuelo extends Model
{
    use HasFactory;
    protected $table = 'tipos_vuelo'; // Nombre correcto de la tabla


    protected $fillable = ['nombre'];
    //
}
