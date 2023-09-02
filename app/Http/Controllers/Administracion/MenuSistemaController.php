<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Modelos\GrupoMenu;
use App\Models\Modelos\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuSistemaController extends Controller
{
    public function inicio(Request $request)
    {
        return view('administracion.menu_sistema.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
            'grupos_menu' => GrupoMenu::orderBy('nombre')->get()
        ]);
    }

    public function add_grupo_menu(Request $request)
    {
        return view('administracion.menu_sistema.forms.add_grupo_menu', []);
    }

    public function store_grupo_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = new GrupoMenu();
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> el grupo correctamente';

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

    public function update_grupo_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = GrupoMenu::find($request->id);
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>ACTUALIZADO</b> el grupo correctamente';

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

    public function seleccionar_grupo_menu(Request $request)
    {
        $grupo = GrupoMenu::find($request->id);

        return view('administracion.menu_sistema.partials.seleccionar_grupo_menu', [
            'grupo' => $grupo,
        ]);
    }

    public function add_menu(Request $request)
    {
        return view('administracion.menu_sistema.forms.add_menu', [
            'grupo' => $request->grupo
        ]);
    }

    public function store_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = new Menu();
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->icono = espacios(mb_strtolower($request->icono));
            $model->url = espacios(mb_strtolower($request->url));
            $model->id_grupo_menu = espacios(mb_strtolower($request->grupo));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> el menu correctamente';

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

    public function update_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Menu::find($request->id);
            $model->nombre = espacios(mb_strtoupper($request->nombre));
            $model->icono = espacios(mb_strtolower($request->icono));
            $model->url = espacios(mb_strtolower($request->url));
            $model->save();

            $success = true;
            $msg = 'Se ha <b>ACTUALIZADO</b> el menu correctamente';

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

    public function cambiar_estado_grupo_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = GrupoMenu::find($request->id);
            $model->estado = $model->estado == 1 ? 0 : 1;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado del grupo correctamente';

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

    public function cambiar_estado_menu(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Menu::find($request->id);
            $model->estado = $model->estado == 1 ? 0 : 1;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>CAMBIADO</b> el estado del menu correctamente';

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
