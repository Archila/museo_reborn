<?php

namespace App\Http\Controllers;

use App\editoriale;
use App\libro;
use Illuminate\Http\Request;
use Rimorsoft\Http\Requests\EditorialRequest;

class EditorialeController extends Controller
{
    public function index()
    {
      $result=editoriale::all();
      return view('editorial.index', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      
      $editorial = new editoriale;
      $editorial->nombre = $request->nombreeditorial;
      $editorial->save();
      alert()-> success('Se ingeso correctamente la nueva editorial','Editorial');
      return back();
    }

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

    public function edit($id)
    {
      $editorial=editoriale::findOrFail($id);
      return view('editorial.edit',compact('editorial'));
    }

    public function update(Request $request,$id)
    {
      $editorial = editoriale::find($id);
      $editorial->nombre =$request->nombreeditorial;
      $editorial->save();

      alert()-> success('Se actualizaron los campos','Editorial');
      return redirect('Editorial/');
    }

    public function destroy($id)
    {
      $editorial = editoriale::find($id);
      $editorial->delete();
      alert()-> success('Eliminado correctamente','Editorial');
      return back();
    }
}
