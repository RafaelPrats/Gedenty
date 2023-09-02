<?php

use Illuminate\Support\Facades\Route;

Route::get('errores_acceso_denegado', function () {
    return view('errores.acceso_denegado');
});
Route::get('errores_usuario_inactivo', function () {
    return view('errores.usuario_inactivo');
});
