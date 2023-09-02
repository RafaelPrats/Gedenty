<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Modelos\Empresa;
use App\Models\Modelos\Menu;
use App\Models\Modelos\Usuario;
use App\Models\Modelos\UsuarioSucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function inicio(Request $request)
    {
        return view('administracion.usuarios.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
        ]);
    }

    public function listar_reporte(Request $request)
    {
        $listado = DB::table('usuario')
            ->where('nombre_completo', 'like', '%' . espacios(mb_strtoupper($request->busqueda)) . '%')
            ->orderBy('nombre_completo')
            ->get();
        return view('administracion.usuarios.partials.listado', [
            'listado' => $listado
        ]);
    }

    public function update_usuario(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Usuario::find($request->id);
            $model->nombre_completo = espacios(mb_strtoupper($request->nombre));
            $model->username = espacios(mb_strtolower($request->username));
            $model->correo = espacios(mb_strtolower($request->correo));
            $model->tipo = $request->tipo;
            if ($request->passw != '')
                $model->password = Hash::make($request->passw);
            $model->save();

            $success = true;
            $msg = 'Se ha <b>ACTUALIZADO</b> el usuario correctamente';

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

    public function cambiar_estado_usuario(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Usuario::find($request->id);
            $model->estado = $model->estado == 1 ? 0 : 1;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado del usuario correctamente';

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

    public function add_usuario(Request $request)
    {
        $roles = DB::table('rol')
            ->where('estado', 1)
            ->orderBy('nombre')
            ->get();
        return view('administracion.usuarios.forms.add_usuario', [
            'roles' => $roles
        ]);
    }

    public function store_usuario(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'username' => 'required|unique:usuario|max:250',
            'correo' => 'required|unique:usuario|max:250',
            'nombre_completo' => 'required|max:250',
            'passw' => 'required|max:250',
            'tipo' => 'required',
            'rol' => 'required',
        ], [
            'username.max' => 'El nombre de usuario es muy grande',
            'username.required' => 'El nombre de usuario es obligatorio',
            'username.unique' => 'El nombre de usuario ya existe',
            'nombre_completo.max' => 'El nombre de la persona es muy grande',
            'nombre_completo.required' => 'El nombre de la persona es obligatorio',
            'passw.max' => 'La contraseña es muy grande',
            'passw.required' => 'La contraseña es obligatoria',
            'correo.max' => 'El correo es muy grande',
            'correo.required' => 'El correo es obligatorio',
            'tipo.required' => 'El tipo es obligatorio',
            'rol.required' => 'El rol es obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = new Usuario();
                $model->nombre_completo = espacios(mb_strtoupper($request->nombre_completo));
                $model->username = espacios(mb_strtolower($request->username));
                $model->correo = espacios(mb_strtolower($request->correo));
                $model->tipo = $request->tipo;
                $model->password = Hash::make($request->passw);
                $model->save();

                $success = true;
                $msg = 'Se ha <b>CREADO</b> el usuario correctamente';

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

    public function empresas_usuario(Request $request)
    {
        $empresas = Empresa::orderBy('nombre')
            ->get();
        $mis_sucursales = DB::table('usuario_sucursal')
            ->where('id_usuario', $request->usuario)
            ->get()->pluck('id_sucursal')->toArray();
        return view('administracion.usuarios.forms.empresas_usuario', [
            'empresas' => $empresas,
            'mis_sucursales' => $mis_sucursales,
            'usuario' => $request->usuario,
        ]);
    }

    public function seleccionar_sucursal(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = UsuarioSucursal::All()
                ->where('id_usuario', $request->usuario)
                ->where('id_sucursal', $request->sucursal)
                ->first();
            if ($model == '') {
                $model = new UsuarioSucursal();
                $model->id_usuario = $request->usuario;
                $model->id_sucursal = $request->sucursal;
                $model->save();
            } else {
                $model->delete();
            }

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> la informacion correctamente';

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
