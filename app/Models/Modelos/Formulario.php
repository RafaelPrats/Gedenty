<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $table = 'formulario';
    protected $primaryKey = 'id_formulario';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_cita',
        'id_historia_clinica',
        'fecha',
    ];

    public function historia_clinica()
    {
        return $this->belongsTo('\App\Models\Modelos\HistoriaClinica', 'id_historia_clinica');
    }

    public function cita()
    {
        return $this->belongsTo('\App\Models\Modelos\Cita', 'id_cita');
    }
}
