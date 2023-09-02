<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Modelos\Horario;
use App\Models\Modelos\HorarioDia;
use App\Models\Modelos\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MisHorariosController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario_logeado = getUsuario(session('id_usuario'));
        $mis_sucursales = DB::table('usuario_sucursal as us')
            ->join('sucursal as s', 's.id_sucursal', '=', 'us.id_sucursal')
            ->join('empresa as e', 'e.id_empresa', '=', 's.id_empresa')
            ->select('us.id_sucursal', 's.nombre as nombre_sucursal', 'e.nombre as nombre_empresa')->distinct()
            ->where('us.id_usuario', session('id_usuario'))
            ->orderBy('s.id_empresa')
            ->orderBy('e.nombre')
            ->orderBy('s.nombre')
            ->get();
        return view('negocio.mis_horarios.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
            'mis_sucursales' => $mis_sucursales,
            'usuario_logeado' => $usuario_logeado,
        ]);
    }
    public function get_listado(Request $request)
    {
        $id_usuario = isset($request->especialista) ? $request->especialista : session('id_usuario');
        $mis_horarios = Horario::where('id_usuario', $id_usuario)
            ->where('id_sucursal', $request->sucursal)
            ->orderBy('desde')
            ->get();
        return view('negocio.mis_horarios.partials.listado', [
            'horarios' => $mis_horarios
        ]);
    }
    public function add_horario(Request $request)
    {
        return view('negocio.mis_horarios.forms.add_horario', []);
    }

    public function store_horario(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'desde' => 'required',
            'hasta' => 'required',
        ], [
            'desde.required' => 'La hora desde es obligatoria',
            'hasta.required' => 'La hora hasta es obligatoria',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $id_usuario = isset($request->especialista) ? $request->especialista : session('id_usuario');

                $model = new Horario();
                $model->desde = $request->desde;
                $model->hasta = $request->hasta;
                $model->id_sucursal = $request->sucursal;
                $model->id_usuario = $id_usuario;
                $model->save();

                $success = true;
                $msg = 'Se ha <b>CREADO</b> el horario correctamente';

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

    public function copiar_sucursal(Request $request)
    {
        try {
            $copy = Horario::where('id_usuario', session('id_usuario'))
                ->where('id_sucursal', $request->copy)
                ->get();
            DB::select('delete from horario where id_sucursal = ' . $request->paste . ' and id_usuario = ' . session('id_usuario'));
            foreach ($copy as $c) {
                DB::beginTransaction();
                $model = new Horario();
                $model->desde = $c->desde;
                $model->hasta = $c->hasta;
                $model->id_sucursal = $request->paste;
                $model->id_usuario = Session::get('id_usuario');
                $model->save();
                DB::commit();
            }

            $success = true;
            $msg = 'Se ha <b>COPIADO</b> el horario correctamente';
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

    public function copiar_all_sucursal(Request $request)
    {
        try {
            $copy = Horario::where('id_usuario', session('id_usuario'))
                ->where('id_sucursal', $request->copy)
                ->get();
            $mis_sucursales = DB::table('usuario_sucursal as us')
                ->join('sucursal as s', 's.id_sucursal', '=', 'us.id_sucursal')
                ->join('empresa as e', 'e.id_empresa', '=', 's.id_empresa')
                ->select('us.id_sucursal', 's.nombre as nombre_sucursal', 'e.nombre as nombre_empresa')->distinct()
                ->where('us.id_usuario', session('id_usuario'))
                ->where('us.id_sucursal', '!=', $request->copy)
                ->orderBy('s.id_empresa')
                ->orderBy('e.nombre')
                ->orderBy('s.nombre')
                ->get();
            foreach ($mis_sucursales as $s) {
                DB::select('delete from horario where id_sucursal = ' . $s->id_sucursal . ' and id_usuario = ' . session('id_usuario'));
                foreach ($copy as $c) {
                    DB::beginTransaction();
                    $model = new Horario();
                    $model->desde = $c->desde;
                    $model->hasta = $c->hasta;
                    $model->id_sucursal = $s->id_sucursal;
                    $model->id_usuario = Session::get('id_usuario');
                    $model->save();
                    DB::commit();
                }
            }

            $success = true;
            $msg = 'Se ha <b>COPIADO</b> el horario correctamente';
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

    public function store_horario_dia(Request $request)
    {
        try {
            $model = HorarioDia::All()
                ->where('dia', $request->dia)
                ->where('id_horario', $request->horario)
                ->first();
            DB::beginTransaction();
            if ($model == '') {
                $model = new HorarioDia();
                $model->id_horario = $request->horario;
                $model->dia = $request->dia;
                $model->save();
            } else {
                $model->delete();
            }

            $success = true;
            $msg = 'Se ha <b>CREADO</b> el horario correctamente';

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

    public function update_horario(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'desde' => 'required',
            'hasta' => 'required',
        ], [
            'desde.required' => 'La hora desde es obligatoria',
            'hasta.required' => 'La hora hasta es obligatoria',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = Horario::find($request->horario);
                $model->desde = $request->desde;
                $model->hasta = $request->hasta;
                $model->save();

                $success = true;
                $msg = 'Se ha <b>ACTUALIZADO</b> el horario correctamente';

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

    public function buscar_especialistas(Request $request)
    {
        $especialistas = DB::table('usuario as u')
            ->join('usuario_sucursal as us', 'us.id_usuario', '=', 'u.id_usuario')
            ->select('us.id_usuario', 'u.nombre_completo')->distinct()
            ->whereIn('u.tipo', ['E'])
            ->where('us.id_usuario', '!=', session('id_usuario'))
            ->where('us.id_sucursal', $request->sucursal)
            ->get();

        $options = '<option value="N">Seleccione un especialista</option>';
        foreach ($especialistas as $item) {
            $options .= '<option value="' . $item->id_usuario . '">' . $item->nombre_completo . '</option>';
        }
        return [
            'options' => $options,
        ];
    }
}
