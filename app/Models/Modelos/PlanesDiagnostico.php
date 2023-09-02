<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesDiagnostico extends Model
{
    use HasFactory;

    protected $table = 'planes_diagnostico';
    protected $primaryKey = 'id_planes_diagnostico';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'id_formulario',
        'biometria',
        'quimica_sanguinea',
        'rayos_x',
        'otros',
    ];

    public function formulario()
    {
        return $this->belongsTo('\App\Models\Modelos\Formulario', 'id_formulario');
    }
}
