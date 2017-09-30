<?php

namespace App\Http\Controllers;

use App\editoriale;
use App\libro;
use Illuminate\Http\Request;
use Rimorsoft\Http\Requests\EditorialRequest;

class EditorialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result=editoriale::all();
      return view('editorial.index', compact('result'));
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
      
      $editorial = new editoriale;
      $editorial->nombre = $request->nombreeditorial;
      $editorial->save();
      alert()-> success('Se ingeso correctamente la nueva editorial','Editorial');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\editoriale  $editoriale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $libros=libro::join('autores', 'libros.idautor', '=', 'autores.id')
          ->join('editoriales', 'libros.ideditorial', '=', 'editoriales.id')
          ->join('categorias', 'libros.idcategoria', '=', 'categorias.id')
          ->select('libros.*',
                  'autores.nombre as aut','autores.id as idaut',
                   'editoriales.id as idedit','editoriales.nombre as edit',
                  'categorias.id as idcat','categorias.nombre as cat')
          ->where('editoriales.id', '=', $id)
          ->get();

      $editorial=editoriale::find($id);
      return view('editorial.show',compact('libros','editorial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\editoriale  $editoriale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editorial=editoriale::findOrFail($id);
      return view('editorial.edit',compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\editoriale  $editoriale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $editorial = editoriale::find($id);
      $editorial->nombre =$request->nombreeditorial;
      $editorial->save();

      alert()-> success('Se actualizaron los campos','Editorial');
      return redirect('Editorial/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\editoriale  $editoriale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $editorial = editoriale::find($id);
      $editorial->delete();
      alert()-> success('Eliminado correctamente','Editorial');
      return back();
    }
}
