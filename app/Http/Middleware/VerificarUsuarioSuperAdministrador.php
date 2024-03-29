<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarUsuarioSuperAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (isSuperAdmin())
            return $next($request);
        return redirect()->route('inicio')->with('mensaje', 'No tienes permiso para acceder a este módulo');
    }
}
