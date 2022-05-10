<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->rol_id == 1) {
                return $next($request);
            }
            if (auth()->user()->rol_id == 2) {
                return $next($request);
            }
            return redirect("/"); //si no es admin ni mecanico
        }
    }
}
