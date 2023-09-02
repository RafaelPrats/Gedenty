<?php

namespace App\Http\Middleware;

use App\Models\Modelos\Rol;
use App\Models\Modelos\RolMenu;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Permiso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = explode('/', substr($request->getRequestUri(), 1))[0];
        $mis_url = DB::table('menu as m')
            ->join('rol_menu as rm', 'rm.id_menu', '=', 'm.id_menu')
            ->join('rol as r', 'r.id_rol', '=', 'rm.id_rol')
            ->select('m.url')->distinct()
            ->where('m.estado', 1)
            ->where('r.estado', 1)
            ->where('rm.id_rol', Session::get('id_rol'))
            ->get()->pluck('url')->toArray();
        if (in_array($url, $mis_url))
            return $next($request);
        else
            return new RedirectResponse('errores_acceso_denegado');
            //return new RedirectResponse(view('errores.acceso_denegado'));
    }
}
