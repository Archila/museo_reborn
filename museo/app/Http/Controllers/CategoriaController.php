<?php

namespace App\Http\Controllers;

use App\categoria;
use App\libro;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
      $result=categoria::all();
      return view('categoria.index', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      $categoria = new categoria;
      $categoria->nombre = $request->categoria;
      $categoria->save();
      alert()-> success('Se ingeso correctamente la nueva categoria','Categoria');
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
          ->where('categorias.id', '=', $id)
          ->get();

      $categoria=categoria::find($id);
      return view('categoria.show',compact('libros','categoria'));
    }

    public function edit($id)
    {
      $categoria=categoria::findOrFail($id);
      return view('categoria.edit',compact('categoria'));
    }

    public function update(Request $request,$id)
    {
      $categoria = categoria::find($id);
      $categoria->nombre =$request->nombrecategoria;
      $categoria->save();
      alert()-> success('Se actualizaron los campos','Categorias');
      return redirect('Categoria/');
    }

    public function destroy($id)
    {
      $categoria = categoria::find($id);
      $categoria->delete();
      alert()-> success('Eliminada correctamente','Categoria');
      return back();
    }
}
