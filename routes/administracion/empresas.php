<?php

use App\Http\Controllers\Administracion\EmpresasController;
use Illuminate\Support\Facades\Route;

$controller = EmpresasController::class;

Route::get('empresas', $controller . '@inicio');
Route::get('empresas/listar_empresas', $controller . '@listar_empresas');
Route::post('empresas/update_empresa', $controller . '@update_empresa');
Route::post('empresas/cambiar_estado_empresa', $controller . '@cambiar_estado_empresa');
Route::get('empresas/add_empresa', $controller . '@add_empresa');
Route::post('empresas/store_empresa', $controller . '@store_empresa');
Route::get('empresas/listar_sucursales', $controller . '@listar_sucursales');
Route::get('empresas/add_sucursal', $controller . '@add_sucursal');
Route::post('empresas/store_sucursal', $controller . '@store_sucursal');
Route::post('empresas/update_sucursal', $controller . '@update_sucursal');
Route::post('empresas/cambiar_estado_sucursal', $controller . '@cambiar_estado_sucursal');
