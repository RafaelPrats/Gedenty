<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadActual extends Model
{
    use HasFactory;

    protected $table = 'enfermedad_actual';
    protected $primaryKey = 'id_enfermedad_actual';
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
