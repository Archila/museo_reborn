<?php

namespace App\Http\Controllers;

use App\user;
use App\empleado;
use App\role;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = role::all();
      return view('empleado.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(empleado $empleado)
    {
      $usuario = user::where('empleado', $empleado)->first();
    $empleado = empleado::findOrFail($empleado);
    $roles = role::all();


    return view('Empleado/edit',compact('empleado','usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $empleado)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
      $user = user::findOrFail($request->idusuario);
    $user->delete();

    $empleadod = empleado::findOrFail($empleado);
    $empleadod->delete();



  alert()->success('Transaccion', 'Transaccion completa');
  return redirect('Empleado');
  }
}
