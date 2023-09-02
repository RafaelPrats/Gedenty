<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'cita';
    protected $primaryKey = 'id_cita';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'desde',
        'hasta',
        'id_usuario',
        'fecha',
        'id_paciente',
        'id_sucursal',
        'id_labor',
    ];

    public function usuario()
    {
        return $this->belongsTo('\App\Models\Modelos\Usuario', 'id_usuario');
    }

    public function paciente()
    {
        return $this->belongsTo('\App\Models\Modelos\Paciente', 'id_paciente');
    }

    public function sucursal()
    {
        return $this->belongsTo('\App\Models\Modelos\Sucursal', 'id_sucursal');
    }

    public function labor()
    {
        return $this->belongsTo('\App\Models\Modelos\Labor', 'id_labor');
    }
}
