<?php

namespace App\Http\Controllers;

use App\genero;
use App\pieza;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result=genero::all();
      return view('genero.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Genero.nuevogenero');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $genero = new genero;
      $genero->genero = $request->nombregenero;
      $genero->save();
      alert()-> success('Se ingeso correctamente','Genero');
     return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $piezas = pieza::join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
                      ->join('fichas_tecnicas','piezas.id',"=","fichas_tecnicas.idpieza")
                        ->where('activo', '!=', 0)
                        ->where('genero', '=', $id)
                        ->get();
      $genero=genero::find($id);
      return view('genero.show', compact('piezas','genero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $genero=genero::findOrFail($id);
      return view('genero.edit',compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $genero = genero::find($id);
      $genero->genero =$request->nombregenero;
      $genero->save();

      alert()-> success('Se actualizaron los campos','Genero');
      return redirect('Genero/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $genero = genero::find($id);
      $genero->delete();
      alert()-> success('Eliminado correctamente','Genero');
      return back();
    }
}
