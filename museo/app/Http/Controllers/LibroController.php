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

    public function search(Request $request)
    {
      if ($request->ajax())
      {
     $output="";
      $donantes=libro::join('autores', 'libros.idautor', '=', 'autores.id')
          ->join('editoriales', 'libros.ideditorial', '=', 'editoriales.id')
          ->join('categorias', 'libros.idcategoria', '=', 'categorias.id')
          ->select('libros.*', 'autores.nombre as aut','autores.id as idaut',
                  'editoriales.id as idedit','editoriales.nombre as edit',
                  'categorias.id as idcat','categorias.nombre as cat')
                  ->where('libros.nombre','LIKE','%'.$request->search.'%')
                  ->orWhere('categorias.nombre','LIKE','%'.$request->search.'%')
                  ->orWhere('autores.nombre','LIKE','%'.$request->search.'%')
                   ->get();
     $cont=1;
      if ($donantes)
       {
         foreach ($donantes as $key => $donantes)
          {
            $output.='
            <div class="col s6 m4 l2">
              <div class="card bgimg z-depth-5">
                <div class="card-content white-text">
                  <p class="card-title center">'.$donantes->nombre.'</p>
                  <p class="medium center"><a href="'.$donantes->idaut.'">'.$donantes->aut.'</a></p>
                  <div class="divider"></div>
                  <p class="light left">Edicion: </p><p class="medium">'.$donantes->edicion.'</p>
                  <p class="light left">Año: </p><p class="medium">'.$donantes->anio.'</p>
                  <p class="light left">Páginas:</p><p class="medium ">'.$donantes->paginas.'</p>
                  <span class="light">Editorial: </span> <a href="{{route("Editorial.show",'.$donantes->idedit.')}}">'.$donantes->edit.'</a><br>
                  <span class="light">Categoria: </span> <a href="{{route("Categoria.show",'.$donantes->idcat.')}}">'.$donantes->cat.'</a>
                </div>
              </div>
           </div>';
                     $cont++;
         }
         return Response($output);

       }
      }
    }
}
