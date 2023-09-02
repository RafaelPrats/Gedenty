<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Modelos\Empresa;
use App\Models\Modelos\Menu;
use App\Models\Modelos\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmpresasController extends Controller
{
    public function inicio(Request $request)
    {
        return view('administracion.empresas.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
        ]);
    }

    public function listar_empresas(Request $request)
    {
        $listado = DB::table('empresa')
            ->where('nombre', 'like', '%' . espacios(mb_strtoupper($request->busqueda)) . '%')
            ->orderBy('nombre')
            ->get();
        return view('administracion.empresas.partials.listar_empresas', [
            'listado' => $listado
        ]);
    }

    public function update_empresa(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Empresa::find($request->id);
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>ACTUALIZADO</b> la empresa correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function cambiar_estado_empresa(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Empresa::find($request->id);
            $model->estado = $model->estado == 1 ? 0 : 1;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado de la empresa correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function add_empresa(Request $request)
    {
        return view('administracion.empresas.forms.add_empresa', []);
    }

    public function store_empresa(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'nombre' => 'required|unique:empresa|max:250',
        ], [
            'nombre.unique' => 'El nombre de la empresa ya existe',
            'nombre.max' => 'El nombre de la empresa es muy grande',
            'nombre.required' => 'El nombre de la empresa es obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = new Empresa();
                $model->nombre = espacios(mb_strtoupper($request->nombre));
                $model->save();

                $success = true;
                $msg = 'Se ha <b>CREADO</b> la empresa correctamente';

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

    public function listar_sucursales(Request $request)
    {
        $empresa = Empresa::find($request->emp);
        $listado = $empresa->sucursales->sortBy('nombre');
        return view('administracion.empresas.partials.listar_sucursales', [
            'listado' => $listado,
            'empresa' => $empresa,
        ]);
    }

    public function add_sucursal(Request $request)
    {
        return view('administracion.empresas.forms.add_sucursal', []);
    }

    public function store_sucursal(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'nombre' => 'required|unique:sucursal|max:250',
        ], [
            'nombre.unique' => 'El nombre de la sucursal ya existe',
            'nombre.max' => 'El nombre de la sucursal es muy grande',
            'nombre.required' => 'El nombre de la sucursal es obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = new Sucursal();
                $model->nombre = espacios(mb_strtoupper($request->nombre));
                $model->id_empresa = $request->empresa;
                $model->save();

                $success = true;
                $msg = 'Se ha <b>CREADO</b> la sucursal correctamente';

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

    public function update_sucursal(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'nombre' => 'required|max:250',
        ], [
            'nombre.max' => 'El nombre de la sucursal es muy grande',
            'nombre.required' => 'El nombre de la sucursal es obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = Sucursal::find($request->id);
                $model->nombre = espacios(mb_strtoupper($request->nombre));
                $model->save();

                $success = true;
                $msg = 'Se ha <b>ACTUALIZADO</b> la sucursal correctamente';

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

    public function cambiar_estado_sucursal(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Sucursal::find($request->id);
            $model->estado = $model->estado == 1 ? 0 : 1;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado de la sucursal correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center">' .
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
