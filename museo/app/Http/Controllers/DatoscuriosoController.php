<?php

namespace App\Http\Controllers;

use App\datoscurioso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatoscuriosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos = datoscurioso::all();
        return view('datoscuriosos.index')->with('datos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datoscuriosos.create');
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
               $dato = new datoscurioso;
               $dato->dato = $request->dato;
               $dato->save();
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
               return redirect('DatoCurioso');
             }
             else
             {
               alert()-> success(''.$mes.'','Dato Curioso');
              return redirect('DatoCurioso');
             }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datoscurioso  $datoscurioso
     * @return \Illuminate\Http\Response
     */
    public function show(datoscurioso $datoscurioso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\datoscurioso  $datoscurioso
     * @return \Illuminate\Http\Response
     */
    public function edit( $datoscurioso)
    {
      $dato = datoscurioso::findOrFail($datoscurioso);
      return view('datoscuriosos.edit',compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datoscurioso  $datoscurioso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $datoscurioso)
    {
       $dato = datoscurioso::findOrFail($datoscurioso);
       $dato->dato = $request->dato;
       $dato->save();
       alert()->success('Transaccion', 'Registro Exitoso');
      return redirect('DatoCurioso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\datoscurioso  $datoscurioso
     * @return \Illuminate\Http\Response
     */
    public function destroy( $datoscurioso)
    {

        $dato = datoscurioso::findOrFail($datoscurioso);
        $dato->delete();
        alert()->success('Transaccion', 'Transaccion completa');
        return back();
    }
    public function ran()
    {
      $dator=datoscurioso::all()->random(1);//datoscurioso::Random(1)->get();
        return view('DatosCuriosos.random',compact('dator'));
    }
}
