<?php

use App\Http\Controllers\Administracion\UsuariosController;
use Illuminate\Support\Facades\Route;

$controller = UsuariosController::class;

Route::get('usuarios', $controller . '@inicio');
Route::get('usuarios/listar_reporte', $controller . '@listar_reporte');
Route::post('usuarios/update_usuario', $controller . '@update_usuario');
Route::post('usuarios/cambiar_estado_usuario', $controller . '@cambiar_estado_usuario');
Route::get('usuarios/add_usuario', $controller . '@add_usuario');
Route::post('usuarios/store_usuario', $controller . '@store_usuario');
Route::get('usuarios/empresas_usuario', $controller . '@empresas_usuario');
Route::post('usuarios/seleccionar_sucursal', $controller . '@seleccionar_sucursal');
