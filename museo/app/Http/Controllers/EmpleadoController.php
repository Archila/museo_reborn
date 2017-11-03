<?php

namespace App\Http\Controllers;
use App\User;
use App\empleado;
use App\role;
use App\permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
      $empleados = empleado::join('users', 'empleados.id', '=', 'users.empleado')
          ->select(
                  'empleados.id as id',
                  'empleados.nombre as nombre',
                  'empleados.activo as activo',
                  'empleados.telefono as telefono',
                  'empleados.email as email',
                  'empleados.dpi as dpi',
                  'users.name  as name',
                  'users.id  as iduser'
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
        $mes="Ingreso";
        DB::beginTransaction();
         try {
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
                $usuario->empleado=$resultadoEidEm;
                $usuario->save();

                $userG = user::where('name','=',$request->usuario)
                          ->orWhere('email','=',$request->email)
                          ->select('users.id as id')
                          ->get();

                $idUsG=$userG[0];
                $resultadoEidUser = intval(preg_replace('/[^0-9]+/', '', $idUsG), 10);


                 foreach ($_POST['roles'] as  $valor){
                   $permiso = new permiso;
                   $permiso->idrol=$valor;
                   $permiso->iduser = $resultadoEidUser;
                   $permiso->save();
                 }


                DB::commit();

                $mes="Ingreso correcto";
               }
               catch (\Exception $e)
               {
                   DB::rollback();
                   $mes=$e->getMessage();
               }
               if ($mes!="Ingreso correcto")
                {
                 alert()->error(''.$mes.'', 'Error');
                 return redirect('Empleado');
               }
               else
               {
                 alert()-> success(''.$mes.'','Empleado');
                return redirect('Empleado');
              }

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
    public function edit($empleado)
    {
      $usuario = User::where('empleado', $empleado)->first();
      $empleado = empleado::findOrFail($empleado);

      $idU=$usuario->id;


      $permisos =permiso::join('users', 'permisos.iduser', '=', 'users.id')
          ->join('roles', 'permisos.idrol', '=', 'roles.id')
          ->select(
                  'roles.id as idpermiso',
                  'roles.nombre as name'
                  )
          ->where('iduser', '=', $idU)
          ->get();


      $roles = role::all();

      return view('empleado/edit',compact('empleado','usuario','roles','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $empleado)
    {
       $idusuarioE=$request->idusuario;


      $mes="Ingreso";
      DB::beginTransaction();
       try {


           $usuario=User::findOrFail($idusuarioE);
           $usuario->name=$request->usuario;
           $usuario->email=$request->email;
           $usuario->password=bcrypt($request->password);
           $usuario->empleado=$empleado;
           $usuario->save();

           $empleado = empleado::findOrFail($empleado);
           $empleado->nombre = $request->uname;
           $empleado->telefono = $request->phone;
           $empleado->email = $request->email;
           $empleado->dpi = $request->dpi;
           $empleado->save();

           DB::table('permisos')->where('iduser', '=', $idusuarioE)->delete();

            foreach ($_POST['roles'] as  $valor)
            {

              $permiso = new permiso;
              $permiso->idrol=$valor;
              $permiso->iduser = $idusuarioE;
              $permiso->save();

            }
              DB::commit();

              $mes="Ingreso correcto";
             }
             catch (\Exception $e)
             {
                 DB::rollback();
                 $mes=$e->getMessage();
             }
             if ($mes!="Ingreso correcto")
              {
               alert()->error(''.$mes.'', 'Error');
               return redirect('Empleado');
             }
             else
             {
               alert()-> success(''.$mes.'','Empleado');
              return redirect('Empleado');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $empleado)
    {
      $idusuario=$request->idusuario;

      $permisos =permiso::join('users', 'permisos.iduser', '=', 'users.id')
          ->join('roles', 'permisos.idrol', '=', 'roles.id')
          ->select(
                  'roles.nombre as name'
                  )
          ->where('iduser', '=', $idusuario)
          ->get();

        $eliminar="si";

      foreach ($permisos as $permiso)
      {
        if ($permiso->name=="Admin")
        {
          $eliminar="no";
        }
      }

      if ($eliminar=="si") {

        DB::table('permisos')->where('iduser', '=', $idusuario)->delete();

        $user = User::findOrFail($idusuario);
        $user->delete();

        $empleadod = empleado::findOrFail($empleado);
        $empleadod->delete();
        alert()->success('Transaccion', 'Transaccion completa');
      }
      else {
      alert()->success('Transaccion', 'No se puede eliminar al administrador');
      }
      return back();
    }
}
