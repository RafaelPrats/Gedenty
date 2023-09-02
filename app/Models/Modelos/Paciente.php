<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'paciente';
    protected $primaryKey = 'id_paciente';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'estado',
        'identificacion',
    ];

    public function historia_clinica()
    {
        return $this->hasOne('\App\Models\Modelos\HistoriaClinica', 'id_paciente');
    }

}
