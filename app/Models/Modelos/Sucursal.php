<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursal';
    protected $primaryKey = 'id_sucursal';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'estado',
        'id_empresa',
    ];

    public function empresa()
    {
        return $this->belongsTo('\App\Models\Modelos\Empresa', 'id_empresa');
    }
}
