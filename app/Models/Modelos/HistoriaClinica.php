<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;

    protected $table = 'historia_clinica';
    protected $primaryKey = 'id_historia_clinica';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_paciente',
        'codigo',
        'fecha_registro',
    ];

    public function paciente()
    {
        return $this->belongsTo('\App\Models\Modelos\Paciente', 'id_paciente');
    }
}
