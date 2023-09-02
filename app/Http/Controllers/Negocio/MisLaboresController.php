<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Modelos\Labor;
use App\Models\Modelos\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MisLaboresController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario_logeado = getUsuario(session('id_usuario'));
        if ($usuario_logeado->tipo == 'A') {
            $mis_sucursales = DB::table('usuario_sucursal')
                ->where('id_usuario', $usuario_logeado->id_usuario)
                ->get()->pluck('id_sucursal')->toArray();
            $especialistas = DB::table('usuario as u')
                ->join('usuario_sucursal as us', 'us.id_usuario', '=', 'u.id_usuario')
                ->select('us.id_usuario', 'u.nombre_completo')->distinct()
                ->whereIn('u.tipo', ['E'])
                ->where('us.id_usuario', '!=', $usuario_logeado->id_usuario)
                ->whereIn('us.id_sucursal', $mis_sucursales)
                ->get();
        }
        return view('negocio.mis_labores.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
            'usuario_logeado' => $usuario_logeado,
            'especialistas' => isset($especialistas) ? $especialistas : [],
        ]);
    }

    public function listar_reporte(Request $request)
    {
        $id_usuario = isset($request->especialista) ? $request->especialista : session('id_usuario');
        $listado = Labor::where('id_usuario', $id_usuario)
            ->orderBy('nombre')
            ->get();
        return view('negocio.mis_labores.partials.listado', [
            'listado' => $listado
        ]);
    }

    public function add_labor(Request $request)
    {
        return view('negocio.mis_labores.forms.add_labor', []);
    }

    public function store_labor(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $id_usuario = isset($request->especialista) ? $request->especialista : session('id_usuario');
                $model = new Labor();
                $model->nombre = espacios(mb_strtoupper($request->nombre));
                $model->id_usuario = $id_usuario;
                $model->save();

                $success = true;
                $msg = 'Se ha <b>CREADO</b> la actividad correctamente';

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $success = false;
                $msg = '<div class="alert alert-danger text-center text-white">' .
                    '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                    '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                    . '</div>';
            }
        } else {
            $success = false;
            $errores = '';
            foreach ($valida->errors()->all() as $mi_error) {
                if ($errores == '') {
                    $errores = '<li>' . $mi_error . '</li>';
                } else {
                    $errores .= '<li>' . $mi_error . '</li>';
                }
            }
            $msg = '<div class="alert alert-danger border_radius-gedenty text-white">' .
                '<p class="text-center">¡Por favor corrija los siguientes errores!</p>' .
                '<ul>' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function update_labor(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = Labor::find($request->id);
                $model->nombre = espacios(mb_strtoupper($request->nombre));
                $model->save();

                $success = true;
                $msg = 'Se ha <b>ACTUALIZADO</b> la actividad correctamente';

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $success = false;
                $msg = '<div class="alert alert-danger text-center text-white">' .
                    '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                    '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                    . '</div>';
            }
        } else {
            $success = false;
            $errores = '';
            foreach ($valida->errors()->all() as $mi_error) {
                if ($errores == '') {
                    $errores = '<li>' . $mi_error . '</li>';
                } else {
                    $errores .= '<li>' . $mi_error . '</li>';
                }
            }
            $msg = '<div class="alert alert-danger border_radius-gedenty text-white">' .
                '<p class="text-center">¡Por favor corrija los siguientes errores!</p>' .
                '<ul>' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function cambiar_estado_labor(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Labor::find($request->id);
            $model->estado = !$model->estado;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado de la actividad correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }
}
