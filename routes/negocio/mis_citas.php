<?php

use App\Http\Controllers\Negocio\MisCitasController;
use Illuminate\Support\Facades\Route;

$controller = MisCitasController::class;

Route::get('mis_citas', $controller . '@inicio');
Route::get('mis_citas/listar_reporte', $controller . '@listar_reporte');
Route::get('mis_citas/agendar_cita', $controller . '@agendar_cita');
Route::post('mis_citas/buscar_paciente', $controller . '@buscar_paciente');
Route::post('mis_citas/store_cita', $controller . '@store_cita');
Route::post('mis_citas/cancelar_cita', $controller . '@cancelar_cita');
Route::get('mis_citas/confirmar_cita', $controller . '@confirmar_cita');
Route::post('mis_citas/store_historia', $controller . '@store_historia');

/* CONTENIDO DEL FORMULARIO */
Route::get('mis_citas/getForm1', $controller . '@getForm1');
Route::get('mis_citas/getForm2', $controller . '@getForm2');
Route::get('mis_citas/getForm3', $controller . '@getForm3');
Route::get('mis_citas/getForm4', $controller . '@getForm4');
Route::get('mis_citas/getForm5', $controller . '@getForm5');
Route::get('mis_citas/getForm6', $controller . '@getForm6');
Route::get('mis_citas/getForm10', $controller . '@getForm10');
Route::get('mis_citas/getForm11', $controller . '@getForm11');

Route::post('mis_citas/store_motivo_consulta', $controller . '@store_motivo_consulta');
Route::post('mis_citas/store_enfermedad_actual', $controller . '@store_enfermedad_actual');
Route::post('mis_citas/store_antecedentes', $controller . '@store_antecedentes');
Route::post('mis_citas/store_signos_vitales', $controller . '@store_signos_vitales');
Route::post('mis_citas/store_examen_sistema_est', $controller . '@store_examen_sistema_est');
Route::post('mis_citas/store_planes_diagnostico', $controller . '@store_planes_diagnostico');
Route::get('mis_citas/seleccionar_diente', $controller . '@seleccionar_diente');

