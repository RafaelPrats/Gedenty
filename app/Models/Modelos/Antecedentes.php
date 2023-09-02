<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedentes extends Model
{
    use HasFactory;

    protected $table = 'antecedentes';
    protected $primaryKey = 'id_antecedentes';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'id_formulario',
        'alergia_antibiotico',
        'alergia_anestesia',
        'hemorragias',
        'vih',
        'asma',
        'diabetes',
        'hipertension',
        'enf_cardiaca',
        'otro',
    ];

    public function formulario()
    {
        return $this->belongsTo('\App\Models\Modelos\Formulario', 'id_formulario');
    }
}
