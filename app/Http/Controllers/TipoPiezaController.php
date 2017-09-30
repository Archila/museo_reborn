<?php

namespace App\Http\Controllers;

use App\tipo_pieza;
use App\pieza;
use Illuminate\Http\Request;


class TipoPiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=tipo_pieza::all();
        return view('tipopieza.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipopieza.nuevotipopieza');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tp = new tipo_pieza;
      $tp->nombre = $request->nombretipo;
      $tp->save();
      alert()-> success('Se ingeso correctamente el nuevo tipo','Tipo de pieza');
     return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_pieza  $tipo_pieza
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $piezas = pieza::join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
                        ->where('activo', '!=', 0)
                        ->where('id_tipopieza', '=', $id)
                        ->get();
      $tipo=tipo_pieza::where('id_tipo', '=', $id)->get();
      return view('tipopieza.show', compact('piezas','tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_pieza  $tipo_pieza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tpieza=tipo_pieza::where('id_tipo',$id)->get();
      return view('tipopieza.edit',compact('tpieza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_pieza  $tipo_pieza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $tpieza= tipo_pieza::
        where('id_tipo', $id)
        ->update(
          ['nombre' => $request->nombretipo]);
      alert()-> success('Se actualizaron los campos','Tipo de pieza');
      return redirect('TipoPieza/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_pieza  $tipo_pieza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tp= tipo_pieza::where('id_tipo', $id);
        $tp->delete();
        alert()-> success('Eliminado correctamente','Tipo de pieza');
        return back();
    }
}
