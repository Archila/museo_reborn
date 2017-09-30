<?php

namespace App\Http\Controllers;

use App\tipo_adquisicione;
use App\adquisicione;
use Illuminate\Http\Request;

class TipoAdquisicioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tpadquisiciones = tipo_adquisicione::all();
      return view('tipoadquisicion.index',compact('tpadquisiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoadquisicion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tadquisicion = new tipo_adquisicione;
      $tadquisicion->nombre = $request->uname;
      $tadquisicion->save();
      alert()->success('Se ingreso con exito', 'Tipo de adquisicion');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_adquisicione  $tipo_adquisicione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $piezas = adquisicione::join('tipo_adquisiciones','adquisiciones.idtipoad',"=","tipo_adquisiciones.id")
                      ->join('piezas','adquisiciones.idpieza',"=","piezas.id")
                      ->join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
                      ->join('fichas_tecnicas','piezas.id',"=","fichas_tecnicas.idpieza")
                        ->where('activo', '!=', 0)
                        ->where('tipo_adquisiciones.id', '=', $id)
                        ->get();
      $tipoad=tipo_adquisicione::find($id);
      return view('tipoadquisicion.show', compact('piezas','tipoad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_adquisicione  $tipo_adquisicione
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tpadquisicion = tipo_adquisicione::findOrFail($id);
      return view('tipoadquisicion.edit',compact('tpadquisicion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_adquisicione  $tipo_adquisicione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $tpadquisicion = tipo_adquisicione::findOrFail($id);
      $tpadquisicion->nombre = $request->uname;
      $tpadquisicion->save();
      alert()->success('Se actualizaron los campos', 'Tipo de adquisicion');
      return redirect('TipoAdquisicion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_adquisicione  $tipo_adquisicione
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tpadquisiciond = tipo_adquisicione::findOrFail($id);
      $tpadquisiciond->delete();
      alert()->success('Se elimino correctamente el tipo de adquisición', 'Eliminado');
      return back();
    }
}
