<?php

namespace App\Models\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolMenu extends Model
{
    use HasFactory;

    protected $table = 'rol_menu';
    protected $primaryKey = 'id_rol_menu';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_rol',
        'id_menu',
    ];

    public function rol()
    {
        return $this->belongsTo('\App\Models\Modelos\Rol', 'id_rol');
    }

    public function menu()
    {
        return $this->belongsTo('\App\Models\Modelos\Menu', 'id_menu');
    }
}
