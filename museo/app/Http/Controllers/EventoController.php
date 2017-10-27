<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;

use App\Http\Controllers\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $eventos = evento::all();
      return view('Evento.index')->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('Evento/create');
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
            $user = Auth::user();
            $idemp=$user->empleado;

            $datei = $request->fechai;
            $datef = $request->fechaf;

            $evento = new evento;
            $evento->nombre = $request->nombre;
            $evento->descripcion = $request->desc;
            $evento->fecha_inicial =$datei;
            $evento->fecha_final = $datef;
            $evento->empleado = $idemp;
            $evento->save();
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
             return redirect('Evento');
           }
           else
           {
             alert()-> success(''.$mes.'','Evento');
            return redirect('Evento');
           }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($evento)
    {
      $evento = evento::findOrFail($evento);
      return view('Evento/edit',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $evento)
    {

     $user = Auth::user();
     $idemp=$user->empleado;

     $datei = $request->fechai;
     $datef = $request->fechaf;

     $activo=$request->sino;


     $evento = evento::findOrFail($evento);
      $evento->nombre = $request->nombre;
      $evento->descripcion = $request->desc;
      $evento->fecha_inicial =$datei;
      $evento->fecha_final = $datef;
      $evento->activo = $activo;
      $evento->empleado = $idemp;
      $evento->save();
   alert()->success('Transaccion', 'Registro Exitoso');
     return redirect('Evento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($evento)
    {
      $evento = evento::findOrFail($evento);
      $evento->delete();
      alert()->success('Transaccion', 'Transaccion completa');
      return back();
    }
}
