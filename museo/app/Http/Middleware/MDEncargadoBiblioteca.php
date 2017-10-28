<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Contracts\Auth\Guard;
use App\permiso;
class MDEncargadoBiblioteca
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
        if ($role->name=='Bibliotecario')
         {
          return $next($request);
        }
      }
      return new Response(view('mensajeerror.Error')->with('msj','No tiene privilegios como encargado del la biblioteca'));

    }

}
