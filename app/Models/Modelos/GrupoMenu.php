<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMenu extends Model
{
    use HasFactory;

    protected $table = 'grupo_menu';
    protected $primaryKey = 'id_grupo_menu';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'fecha_registro',
        'estado',
    ];

    public function menus()
    {
        return $this->hasMany('\App\Models\Modelos\Menu', 'id_grupo_menu')->orderBy('nombre');
    }

    public function menus_activos()
    {
        return $this->hasMany('\App\Models\Modelos\Menu', 'id_grupo_menu')->where('estado', '=', 'A')->orderBy('nombre');
    }
}
