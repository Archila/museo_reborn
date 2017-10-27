<?php

namespace App\Http\Controllers;

use App\libro;
use App\autore;
use App\categoria;
use App\editoriale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function index()
    {
        $libros=libro::join('autores', 'libros.idautor', '=', 'autores.id')
            ->join('editoriales', 'libros.ideditorial', '=', 'editoriales.id')
            ->join('categorias', 'libros.idcategoria', '=', 'categorias.id')
            ->select('libros.*', 'autores.nombre as aut','autores.id as idaut',
                    'editoriales.id as idedit','editoriales.nombre as edit',
                    'categorias.id as idcat','categorias.nombre as cat')
            ->get();
        $categorias=categoria::all();
        $editoriales=editoriale::all();
        $autores=autore::all();
        return view('libro.index',compact('libros','categorias','editoriales','autores'));
    }

    public function create()
    {
        $editoriales=editoriale::all();
        $autores=autore::all();
        $categorias=categoria::all();
        return view('libro.nuevolibro', compact('editoriales','autores','categorias'));
    }

    public function store(Request $request)
    {
      $user = Auth::user();
      $empleado=$user->empleado;

      $libro = new libro;
      $libro->nombre = $request->nombrelibro;
      $libro->idautor = $request->autor;
      $libro->edicion = $request->edicion;
      $libro->anio = $request->anio;
      $libro->paginas = $request->paginas;
      $libro->ideditorial = $request->editorial;
      $libro->idcategoria = $request->categoria;
      $libro->idempleado = $empleado;
      $libro->save();
      alert()-> success('Se ingeso correctamente el libro','Libro');
      return back();
    }

    public function show($id)
    {
        $libros=libro::join('autores', 'libros.idautor', '=', 'autores.id')
          ->join('editoriales', 'libros.ideditorial', '=', 'editoriales.id')
          ->join('categorias', 'libros.idcategoria', '=', 'categorias.id')
          ->select('libros.*', 'autores.nombre as aut','editoriales.nombre as edit','categorias.nombre as cat')
          ->get();
        return view ('libro.list',compact('libros'));
    }

    public function edit($id)
    {
        $libros=libro::join('autores', 'libros.idautor', '=', 'autores.id')
          ->join('editoriales', 'libros.ideditorial', '=', 'editoriales.id')
          ->join('categorias', 'libros.idcategoria', '=', 'categorias.id')
          ->select('libros.*', 'autores.nombre as aut','autores.id as idaut',
                  'editoriales.id as idedit','editoriales.nombre as edit',
                  'categorias.id as idcat','categorias.nombre as cat')
          ->where('libros.id', '=', $id)
          ->get();
          $editoriales=editoriale::all();
          $autores=autore::all();
          $categorias=categoria::all();
        return view ('libro.edit',compact('libros','editoriales','autores','categorias'));
    }

    public function update(Request $request,$id)
    {

      $libro = libro::find($id);
      $libro->nombre = $request->nombrelibro;
      $libro->idautor = $request->autor;
      $libro->edicion = $request->edicion;
      $libro->anio = $request->anio;
      $libro->paginas = $request->paginas;
      $libro->ideditorial = $request->editorial;
      $libro->idcategoria = $request->categoria;
      $libro->save();
      alert()-> success('Se actualizaron los campos correctamente','Libro');
      return redirect('Libro/0');
    }

    public function destroy($id)
    {
        $libro = libro::find($id);
        $libro->delete();
        alert()-> success('Eliminado correctamente','Libro');
        return back();
    }
}
