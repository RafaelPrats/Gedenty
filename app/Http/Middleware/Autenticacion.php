<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class Autenticacion
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
        if ($request->session()->has('logeado')) {
            if ($request->session()->get('logeado')) {
                if (getUsuario($request->session()->get('id_usuario'))->estado == 1)
                    return $next($request);
                else
                    return new Response(view('errores_usuario_inactivo'));
            }
        }
        return response(redirect('login'));
    }
}
