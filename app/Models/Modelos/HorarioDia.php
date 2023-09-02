<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDia extends Model
{
    use HasFactory;

    protected $table = 'horario_dia';
    protected $primaryKey = 'id_horario_dia';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'dia',
        'id_horario',
    ];

    public function horario()
    {
        return $this->belongsTo('\App\Models\Modelos\Horario', 'id_horario');
    }
}
