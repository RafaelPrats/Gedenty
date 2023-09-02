<?php

use App\Http\Controllers\Administracion\PermisosController;
use Illuminate\Support\Facades\Route;

$controller = PermisosController::class;

Route::get('permisos', $controller . '@inicio');
Route::get('permisos/listar_roles', $controller . '@listar_roles');
Route::get('permisos/add_rol', $controller . '@add_rol');
Route::post('permisos/store_rol', $controller . '@store_rol');
Route::post('permisos/update_rol', $controller . '@update_rol');
Route::post('permisos/cambiar_estado_rol', $controller . '@cambiar_estado_rol');
Route::get('permisos/listar_usuarios', $controller . '@listar_usuarios');
Route::get('permisos/add_usuario', $controller . '@add_usuario');
Route::post('permisos/store_usuario', $controller . '@store_usuario');
Route::get('permisos/listar_menus', $controller . '@listar_menus');
Route::get('permisos/add_menu', $controller . '@add_menu');
Route::post('permisos/select_grupo_menu', $controller . '@select_grupo_menu');
Route::post('permisos/store_menu', $controller . '@store_menu');
Route::post('permisos/eliminar_rol_menu', $controller . '@eliminar_rol_menu');
