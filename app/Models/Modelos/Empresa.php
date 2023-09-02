<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';
    protected $primaryKey = 'id_empresa';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function sucursales()
    {
        return $this->hasMany('\App\Models\Modelos\Sucursal', 'id_empresa');
    }
}
