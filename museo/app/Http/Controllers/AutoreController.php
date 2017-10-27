<?php

namespace App\Http\Controllers;

use App\autore;
use App\libro;
use Illuminate\Http\Request;

class AutoreController extends Controller
{
    public function index()
    {
      $result=autore::all();
      return view('autor.index', compact('result'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
      $autor = new autore;
      $autor->nombre = $request->autor;
      $autor->bibliografia = $request->bibliografia;
      $autor->save();
      alert()-> success('Se ingeso correctamente el nuevo autor','Autor');
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
          ->where('autores.id', '=', $id)
          ->get();

      $autor=autore::find($id);
      return view('autor.show',compact('libros','autor'));
    }

    public function edit($id)
    {
      $autor=autore::findOrFail($id);
      return view('autor.edit',compact('autor'));
    }

    public function update(Request $request, $id)
    {
      $autor = autore::find($id);
      $autor->nombre =$request->autor;
      $autor->bibliografia =$request->bibliografia;
      $autor->save();
      alert()-> success('Se actualizaron los campos','Autor');
      return redirect('Autor/');
    }
    
    public function destroy($id)
    {
      $autor = autore::find($id);
      $autor->delete();
      alert()-> success('Eliminado correctamente','Autor');
      return back();
    }
}
