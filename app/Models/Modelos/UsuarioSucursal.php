<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioSucursal extends Model
{
    use HasFactory;

    protected $table = 'usuario_sucursal';
    protected $primaryKey = 'id_usuario_sucursal';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_sucursal',
    ];

    public function sucursal()
    {
        return $this->belongsTo('\App\Models\Modelos\Sucursal', 'id_sucursal');
    }

    public function usuario()
    {
        return $this->belongsTo('\App\Models\Modelos\Usuario', 'id_usuario');
    }
}
