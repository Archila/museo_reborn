<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\categoria;
use App\libro;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
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
      $categoria->prefijo = $request->prefijo;
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
      $categoria->prefijo = $request->prefijo;
      $categoria->save();
      $libros = DB::table('libros')->where('idcategoria',$categoria->id)->get();
      $cont =0;
      foreach ($libros as $libro) {
        $id = $libro->id;
        $cont++;
        if ($cont<10) {
          $libro = DB::table('libros')->where('id',$id)->update(['codigo' => $categoria->prefijo. '00' . $cont]);
        }
        elseif ($cont<100) {
          $libro = DB::table('libros')->where('id',$id)->update(['codigo' => $categoria->prefijo. '0' . $cont]);
        }
        else {
          $libro = DB::table('libros')->where('id',$id)->update(['codigo' => $categoria->prefijo. $cont]);
        }
      }
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
