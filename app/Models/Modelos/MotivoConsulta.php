<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoConsulta extends Model
{
    use HasFactory;

    protected $table = 'motivo_consulta';
    protected $primaryKey = 'id_motivo_consulta';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'id_formulario',
    ];

    public function formulario()
    {
        return $this->belongsTo('\App\Models\Modelos\Formulario', 'id_formulario');
    }
}
