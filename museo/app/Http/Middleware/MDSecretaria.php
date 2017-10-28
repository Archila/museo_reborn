<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\permiso;
class MDSecretaria
{

    public function handle($request, Closure $next)
    {

      $useractual=Auth::User()->id;
      $permisos =permiso::join('users', 'permisos.iduser', '=', 'users.id')
          ->join('roles', 'permisos.idrol', '=', 'roles.id')
          ->select(
                  'roles.nombre as name'
                  )
          ->where('iduser', '=', $useractual)
          ->get();


      foreach ($permisos as $role)
       {
        if ($role->name=='Secretaria')
         {
          return $next($request);
        }
      }
      return new Response(view('MensajeError.Error')->with('msj','No tiene privilegios como Secretaria'));
      
    }

}
