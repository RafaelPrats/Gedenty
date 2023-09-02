<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignosVitales extends Model
{
    use HasFactory;

    protected $table = 'signos_vitales';
    protected $primaryKey = 'id_signos_vitales';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'id_formulario',
        'presion_arterial',
        'frec_cardiaca',
        'temperatura',
        'frec_respiratoria',
    ];

    public function formulario()
    {
        return $this->belongsTo('\App\Models\Modelos\Formulario', 'id_formulario');
    }
}
