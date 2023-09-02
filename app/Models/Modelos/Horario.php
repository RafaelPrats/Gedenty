<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horario';
    protected $primaryKey = 'id_horario';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'desde',
        'id_usuario',
        'hasta',
    ];

    public function usuario()
    {
        return $this->belongsTo('\App\Models\Modelos\Usuario', 'id_usuario');
    }

    public function horario_dias()
    {
        return $this->hasMany('\App\Models\Modelos\HorarioDia', 'id_horario');
    }

    public function getArrayDias()
    {
        return DB::table('horario_dia')
            ->where('id_horario', $this->id_horario)
            ->get()->pluck('dia')->toArray();
    }
}
