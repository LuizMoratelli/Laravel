<?php

namespace App\Http\Middleware;

use Closure;

class Autorizador
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
        if (!$request->is('loginNovo') && \Auth::guest()) {
            dd(\Auth::user());
            //return redirect('/loginNovo');
        }
        return $next($request);
    }
}
