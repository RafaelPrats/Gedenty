<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'nombre_completo',
        'correo',
        'username',
        'password',
        'fecha_registro',
        'estado',
        'punto_acceso',
        'id_rol',
        'imagen_perfil',
        'finca_activa',
    ];

    public function rol()
    {
        return Rol::find($this->id_rol);
    }
}
