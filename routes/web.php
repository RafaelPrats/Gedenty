<?php

use App\Http\Controllers\SystemController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', SystemController::class . '@login');
Route::post('login', SystemController::class . '@verificaUsuario');
Route::get('logout', SystemController::class . '@logout');
include "administracion/errores.php";


Route::group(['middleware' => 'autenticacion'], function () {
    Route::group(['middleware' => 'controlsession'], function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::group(['middleware' => 'permiso'], function () {
            include "administracion/menu_sistema.php";
            include "administracion/permisos.php";
            include "administracion/usuarios.php";
            include "administracion/empresas.php";

            include "negocio/mis_horarios.php";
            include "negocio/mis_citas.php";
            include "negocio/mis_labores.php";
        });
    });
});
