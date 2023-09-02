<?php

use App\Http\Controllers\Negocio\MisHorariosController;
use Illuminate\Support\Facades\Route;

$controller = MisHorariosController::class;

Route::get('mis_horarios', $controller . '@inicio');
Route::get('mis_horarios/get_listado', $controller . '@get_listado');
Route::get('mis_horarios/add_horario', $controller . '@add_horario');
Route::post('mis_horarios/store_horario', $controller . '@store_horario');
Route::post('mis_horarios/copiar_sucursal', $controller . '@copiar_sucursal');
Route::post('mis_horarios/copiar_all_sucursal', $controller . '@copiar_all_sucursal');
Route::post('mis_horarios/store_horario_dia', $controller . '@store_horario_dia');
Route::post('mis_horarios/update_horario', $controller . '@update_horario');
Route::post('mis_horarios/buscar_especialistas', $controller . '@buscar_especialistas');
