<?php

namespace App\Http\Middleware;

use Closure;

class MDEncargadoMuseo
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
        if (\Auth::user()->rol!=3)
        {
         return new Response(view('mensajeerror.Error')->with('msj','No tiene privilegios como encaragado del museo'));
        }
   
        return $next($request);
    }
}
