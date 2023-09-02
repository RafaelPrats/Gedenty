<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Modelos\GrupoMenu;
use App\Models\Modelos\Menu;
use App\Models\Modelos\Rol;
use App\Models\Modelos\RolMenu;
use App\Models\Modelos\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermisosController extends Controller
{
    public function inicio(Request $request)
    {
        return view('administracion.permisos.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
        ]);
    }

    public function listar_roles(Request $request)
    {
        return view('administracion.permisos.partials.listar_roles', [
            'roles' => Rol::orderBy('nombre')->get()
        ]);
    }

    public function add_rol(Request $request)
    {
        return view('administracion.permisos.forms.add_rol', []);
    }

    public function store_rol(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = new Rol();
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> el rol correctamente';

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

    public function update_rol(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Rol::find($request->id);
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>ACTUALIZADO</b> el rol correctamente';

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

    public function cambiar_estado_rol(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Rol::find($request->id);
            $model->estado = $model->estado == 1 ? 0 : 1;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado del rol correctamente';

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

    public function listar_usuarios(Request $request)
    {
        $rol = Rol::find($request->rol);
        return view('administracion.permisos.partials.listar_usuarios', [
            'rol' => $rol
        ]);
    }

    public function add_usuario(Request $request)
    {
        $usuarios = Usuario::where('id_rol', '!=', $request->rol)
            ->where('estado', 1)
            ->where('id_usuario', '!=', 1)
            ->orderBy('nombre_completo')
            ->get();
        return view('administracion.permisos.forms.add_usuario', [
            'usuarios' => $usuarios
        ]);
    }

    public function store_usuario(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Usuario::find($request->usuario);
            $model->id_rol = $request->rol;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>AGREGADO</b> el usuario correctamente';

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

    public function listar_menus(Request $request)
    {
        $rol = Rol::find($request->rol);
        return view('administracion.permisos.partials.listar_menus', [
            'rol' => $rol
        ]);
    }

    public function add_menu(Request $request)
    {
        $grupos = GrupoMenu::where('estado', 1)
            ->orderBy('nombre')
            ->get();
        return view('administracion.permisos.forms.add_menu', [
            'grupos' => $grupos
        ]);
    }

    public function select_grupo_menu(Request $request)
    {
        $mis_menus = DB::table('rol_menu')
            ->select('id_menu')->distinct()
            ->where('id_rol', $request->rol)
            ->get()
            ->pluck('id_menu')->toArray();
        $menus = Menu::whereNotIn('id_menu', $mis_menus)
            ->where('id_grupo_menu', $request->grupo)
            ->where('estado', 1)
            ->orderBy('nombre')
            ->get();
        $options = '';
        foreach ($menus as $m)
            $options .= '<option value="' . $m->id_menu . '">' . $m->nombre . '</option>';
        return [
            'options' => $options
        ];
    }

    public function store_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = new RolMenu();
            $model->id_rol = $request->rol;
            $model->id_menu = $request->menu;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>AGREGADO</b> el menu correctamente';

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

    public function eliminar_rol_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = RolMenu::find($request->id);
            $model->delete();

            $success = true;
            $msg = 'Se ha <b>ELIMINADO</b> el menu correctamente';

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
