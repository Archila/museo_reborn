<?php

namespace App\Http\Controllers;

use App\User;
use App\pieza;
use App\fichas_informativa;
use Illuminate\Http\Request;

class PDF2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id = $request->cod_pieza;
      $piece =pieza::where('cod_pieza', $id)->select('piezas.id')->get(); //Selecciona la pieza donde el Codgio es igual al recibido
      //Extrae el ID de la pieza
      $idpieza=0;
      foreach ($piece as $p)
      {      $idpieza= $p->id;}
      $piezas=\App\pieza::find($idpieza);
      $fecha = date('d-m-Y');
      $view =  \View::make('asistente.prueba_pdf', compact('piezas', 'fecha'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $file = 'pieza.pdf';
      return $pdf->stream('pieza.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
