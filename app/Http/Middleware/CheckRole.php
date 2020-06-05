<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param String $redirect
     * @param String $role
     * @return mixed
     */
    public function handle($request, Closure $next, $redirect, ...$roles)
    {
        
        if(!$request->user()->hasAnyRole($roles))
        {
            return redirect(route($redirect));
            //abort(401, 'No tiene permiso para usar esta funcion');
        }

        return $next($request);
    }
}
