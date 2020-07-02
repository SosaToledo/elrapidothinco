<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        try {
            if (! $request->user()->hasRole($role)){
                abort(403, "No tienes permisos necesarios para acceder.");
                //return redirect('home');
            }
        
        } catch (\Throwable $th) {
            abort(403, "No tienes permisos necesarios para acceder.");
        }
        return $next($request);        
    }
}
