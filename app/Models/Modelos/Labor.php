<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    use HasFactory;

    protected $table = 'labor';
    protected $primaryKey = 'id_labor';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_usuario',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo('\App\Models\Modelos\Usuario', 'id_usuario');
    }
}
