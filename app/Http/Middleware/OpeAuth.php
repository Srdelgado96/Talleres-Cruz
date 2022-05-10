<?php

namespace App\Http\Middleware;

use Closure;

class OpeAuth
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
            } else if (auth()->user()->rol_id == 2) {
                return redirect()->route('Productos.index');
            }
        }
        return redirect()->route('/'); //si no es ope
    }
}
