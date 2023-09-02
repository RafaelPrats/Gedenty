<?php

use App\Http\Controllers\Administracion\MenuSistemaController;
use Illuminate\Support\Facades\Route;

$controller = MenuSistemaController::class;

Route::get('menu_sistema', $controller . '@inicio');
Route::get('menu_sistema/add_grupo_menu', $controller . '@add_grupo_menu');
Route::post('menu_sistema/store_grupo_menu', $controller . '@store_grupo_menu');
Route::post('menu_sistema/update_grupo_menu', $controller . '@update_grupo_menu');
Route::get('menu_sistema/seleccionar_grupo_menu', $controller . '@seleccionar_grupo_menu');
Route::get('menu_sistema/add_menu', $controller . '@add_menu');
Route::post('menu_sistema/store_menu', $controller . '@store_menu');
Route::post('menu_sistema/update_menu', $controller . '@update_menu');
Route::post('menu_sistema/cambiar_estado_grupo_menu', $controller . '@cambiar_estado_grupo_menu');
Route::post('menu_sistema/cambiar_estado_menu', $controller . '@cambiar_estado_menu');
