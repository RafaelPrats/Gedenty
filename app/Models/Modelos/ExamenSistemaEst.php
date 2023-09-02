<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenSistemaEst extends Model
{
    use HasFactory;

    protected $table = 'examen_sistema_est';
    protected $primaryKey = 'id_examen_sistema_est';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'id_formulario',
        'labios',
        'mejillas',
        'maxilar_superior',
        'maxilar_inferior',
        'lengua',
        'paladar',
        'piso',
        'carrillos',
        'glandulas_salivales',
        'oro_faringe',
        'atm',
        'ganglios',
    ];

    public function formulario()
    {
        return $this->belongsTo('\App\Models\Modelos\Formulario', 'id_formulario');
    }
}
