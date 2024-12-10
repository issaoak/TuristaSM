<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use HasFactory, Notifiable;

    // Tabla asociada al modelo
    protected $table = 'usuarios';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'contrasena',
        'role',
    ];

    // Oculta los atributos sensibles al serializar el modelo
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    // Convierte automáticamente atributos a tipos nativos
    protected $casts = [
        'correo_verified_at' => 'datetime',
        'fecha_registro' => 'datetime',
    ];

    // Modifica cómo se establece la contraseña
    public function setContrasenaAttribute($value)
    {
        $this->attributes['contrasena'] = bcrypt($value);
    }
    //
}
