<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'estado',
        'tipo',
    ];

    public function usuarios()
    {
        return $this->hasMany('\App\Models\Modelos\Usuario', 'id_rol');
    }

    public function menus()
    {
        return $this->hasMany('\App\Models\Modelos\RolMenu', 'id_rol');
    }
}
