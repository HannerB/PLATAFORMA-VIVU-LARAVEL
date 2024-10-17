<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || !$request->user()->tipoUsuario || $request->user()->tipoUsuario->nombre !== $role) {
            abort(403, 'Acceso no autorizado.');
        }
        return $next($request);
    }
}
