<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use Redirect;
use App\tipo_pieza;
use App\pieza;
use App\evento;

use App\libro;
use App\autore;
use App\categoria;
use App\editoriale;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Pagina extends Controller
{
  public function index()
  {
    $tpiezas = pieza::join('tipo_piezas', 'piezas.id_tipopieza', '=', 'tipo_piezas.id_tipo')
      ->select(DB::raw('count(piezas.id_tipopieza) as numero,  tipo_piezas.nombre as nametipo'))
       ->groupBy('tipo_piezas.nombre')
      ->get();
      $piezas = pieza::join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
                      ->join('tipo_piezas', 'piezas.id_tipopieza', '=', 'tipo_piezas.id_tipo')
                      ->select('piezas.nombre as nombrepieza','piezas.fotografia as foto',
                      'tipo_piezas.nombre as nombretipo', 'fichas_informativas.historia as historia',
                      'fichas_informativas.epoca as epoca')
                        ->where('activo', '!=', 0)
                        ->take(9)
                        ->get();

    $tipos = pieza::join('tipo_piezas', 'piezas.id_tipopieza', '=', 'tipo_piezas.id_tipo')
      ->select('tipo_piezas.nombre as nametipo')
        ->groupBy('tipo_piezas.nombre')
        ->where('activo', '!=', 0)
      ->get();

        $date = date ('Y-m-d'); //Fecha actual del sistema
        $eventos = evento::orderBy('fecha_inicial','DESC')->where('fecha_final', '>=',$date)->take(3)->get();

      return view('pagina.index', compact('tpiezas','piezas','tipos','eventos'));
  }

  public function contact(Request $request)
  {
    Mail::send('emails.contact',$request->all(), function($msj){
        $msj->subject('Correo de contacto');
        $msj->to('museohistoriasbx@gmail.com');
    });
    Session::flash('message:','Mensaje enciado correctamente');
    return Redirect::to('/contacto');
  }

  public function eventos()
  {
      $date = date ('Y-m-d'); //Fecha actual del sistema
    $eventos = evento::where('fecha_final', '>=',$date)->get();
   return view('pagina.eventos')->with('eventos', $eventos);
  }
  public function libros()
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
    return view('pagina.libros',compact('libros','categorias','editoriales','autores'));
  }



}
