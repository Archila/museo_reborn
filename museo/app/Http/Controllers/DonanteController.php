<?php

namespace App\Http\Controllers;

use App\donante;
use Illuminate\Http\Request;

class DonanteController extends Controller
{


    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {
      $donantes = Donante::all();
      return view('donantes.index')->with('donantes', $donantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donantes.create');
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
         $donante = new Donante;
         $donante->nombre = $request->nombre;
         $donante->apellido = $request->apellido;
         $donante->telefono = $request->phone;
         $donante->email = $request->email;
         $donante->save();
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
           return redirect('Donante');
         }
         else
         {
           alert()-> success(''.$mes.'','Donante');
          return redirect('Donante');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function show(donante $donante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function edit($donante)
    {
      $donante = Donante::findOrFail($donante);
      return view('donantes.edit',compact('donante'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $donante)
    {
      $donante = Donante::findOrFail($donante);
      $donante->nombre = $request->uname;
      $donante->apellido = $request->apellido;
      $donante->telefono = $request->phone;
      $donante->email = $request->email;
      $donante->save();
      alert()->success('Transaccion', 'Transaccion completa');
      return redirect('Donante');    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function destroy($donante)
    {
      $donanted = Donante::findOrFail($donante);
      $donanted->delete();
      alert()->success('Transaccion', 'Transaccion completa');
      return redirect('Donante');
    }

  }
