<?php

namespace App\Http\Middleware;

use Closure;

class MDSecretaria
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
        if (\Auth::user()->rol!=2)
        {
         return new Response(view('mensajeerror.Error')->with('msj','No tiene privilegios como secre'));
        }
        return $next($request);
    }
}
