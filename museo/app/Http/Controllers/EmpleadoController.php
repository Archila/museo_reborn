<?php

namespace App\Http\Controllers;

use App\user;
use App\role;
use App\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    
    public function index()
    {
        $empleados = empleado::join('users', 'empleados.id', '=', 'users.empleado')
        ->join('roles', 'users.rol', '=', 'roles.id')
        ->select(
                'empleados.id as id',
                'empleados.nombre as nombre',
                'empleados.activo as activo',
                'empleados.telefono as telefono',
                'empleados.email as email',
                'empleados.dpi as dpi',
                'users.name  as name',
                'users.id  as iduser',
                'roles.nombre as rol'
                )
        ->get();
       return view('empleado.index',compact('empleados'));
    }

   
    public function create()
    {
        $roles = role::all();
        return view('empleado.create',compact('roles'));
    }

    
    public function store(Request $request)
    {
        $empleado = new empleado;
        $empleado->nombre = $request->uname;
        $empleado->telefono = $request->phone;
        $empleado->email = $request->email;
        $empleado->dpi = $request->dpi;
        $empleado->save();
  
        $empleadoG = empleado::where('nombre','=',$request->uname)
                  ->orWhere('dpi','=',$request->dpi)
                  ->select('empleados.id as id')
                  ->get();
  
        $idEmG=$empleadoG[0];
        $resultadoEidEm = intval(preg_replace('/[^0-9]+/', '', $idEmG), 10);
          $usuario=new user;
          $usuario->name=$request->usuario;
          $usuario->email=$request->email;
          $usuario->password=bcrypt($request->password);
          $usuario->rol=$request->rol;
          $usuario->empleado=$resultadoEidEm;
          $usuario->save();
        alert()->success('Transaccion', 'Registro Exitoso');
        return redirect('Empleado');
    }

    
    public function show(empleado $empleado)
    {
        //
    }

    public function edit( $empleado)
    {
        $usuario = user::where('empleado', $empleado)->first();
        $empleado = empleado::findOrFail($empleado);
        $roles = role::all();
    
        return view('Empleado/edit',compact('empleado','usuario','roles'));
    }

    public function update(Request $request,  $empleado)
    {
        $usuario=user::findOrFail($request->idusuario);
        $usuario->name=$request->usuario;
        $usuario->email=$request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->rol=$request->rol;
        $usuario->empleado=$empleado;
        $usuario->save();
  
        $empleado = empleado::findOrFail($empleado);
        $empleado->nombre = $request->uname;
        $empleado->telefono = $request->phone;
        $empleado->email = $request->email;
        $empleado->dpi = $request->dpi;
        $empleado->save();
  
        alert()->success('Transaccion', 'Transaccion completa');
        return redirect('Empleado');
    }

    public function destroy($empleado)
    {
        $user = user::findOrFail($empleado);
        $user->delete();
    
        $empleadod = empleado::findOrFail($empleado);
        $empleadod->delete();
    
    
    
      alert()->success('Transaccion', 'Transaccion completa');
      return redirect('Empleado');
    }
}
