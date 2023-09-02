<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_grupo_menu',
        'estado',
        'icono',
    ];

    public function grupo_menu()
    {
        return $this->belongsTo('\App\Models\Modelos\GrupoMenu', 'id_grupo_menu');
    }
}
