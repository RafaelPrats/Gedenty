<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControlSession
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
        if (strtotime(date('Y-m-d H:i:s')) - strtotime(Session::get('last_quest')) < 7200)
            Session::put('last_quest', date('Y-m-d H:i:s'));
        else {
            return response(redirect('logout'));
            //return Redirect::to('logout')->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        }

        return $next($request);
    }
}
