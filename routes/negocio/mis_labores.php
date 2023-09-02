<?php

use App\Http\Controllers\Negocio\MisLaboresController;
use Illuminate\Support\Facades\Route;

$controller = MisLaboresController::class;

Route::get('mis_labores', $controller . '@inicio');
Route::get('mis_labores/listar_reporte', $controller . '@listar_reporte');
Route::get('mis_labores/add_labor', $controller . '@add_labor');
Route::post('mis_labores/store_labor', $controller . '@store_labor');
Route::post('mis_labores/update_labor', $controller . '@update_labor');
Route::post('mis_labores/cambiar_estado_labor', $controller . '@cambiar_estado_labor');
