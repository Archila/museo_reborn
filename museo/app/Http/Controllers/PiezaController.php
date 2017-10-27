<?php

namespace App\Http\Controllers;

use App\pieza;
use App\tipo_pieza;
use App\genero;
use App\fichas_informativa;
use App\fichas_tecnica;
use App\tipo_adquisicione;
use App\adquisicione;
use App\donante;
use App\empleado;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piezas = DB::table('piezas')
        ->join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
        ->where('activo', '!=', 0)
        ->get();
        $tipos=tipo_pieza::all();
        $generos=genero::all();
        $tipoad=tipo_adquisicione::all();
        return view('pieza.list', compact('piezas','tipos','generos','tipoad'));
    }

    public function create()
    {
      $a="SBX0";
        $last_piece= pieza::orderBy('id','DESC')->take(1)->get();
        $r =$last_piece;
        
      try
      {
        foreach ($r as $tp)
        {$a= $tp->cod_pieza;}
      }
        
      catch (\Exception $e)
      {$a="SBX0";}
        
        list($asoc, $num) = explode("X", $a); //separa las letras de los numeros
        $last= $num; //contiene la ultima numeración
        $newcod=$last+1; //Numeración de nueva pieza
        
        $tipo_p = tipo_pieza::all();
        $genero= genero::all();
        $tipoadquisiciones =tipo_adquisicione::all();
        return view('pieza.nuevapieza', ['tipo_p' => $tipo_p], ['genero' => $genero])
        ->with('newcod',$newcod)->with('tipoadquisiciones', $tipoadquisiciones);
    }

    
    public function store(Request $request)
    {
      $this->validate($request, [
        'nombrepieza' => 'required',
        'idtipo' => 'required',
        'idgenero' => 'required',
        'tipoadquisicion' => 'required',
       ]);
 
 
       $mes="Ingreso";
       DB::beginTransaction(); //Inicia la transacción
              try {  //Try general por si sucede un problema al insertar la nueva pieza
 
                //Si no hay epoca lo deja como SF
                $epoca='s.f';
                if ($request->epoca != null) {
                   $epoca=$request->epoca; }
 
                //FOTOGRAFIA -Se mostrara en la página-
                //Verifica si no se selecciono una foto asigna una por defecto
                if ($request->file('foto')==null) {
                  $ruta="multimedia/img_navegador/pieza-default.jpg";
                }
                else{ //Si se selecciono una imagen la sube al servidor y guarda la ruta
                  $ruta=$request->file('foto')->store('img_navegador');
                  $ruta="multimedia/".$ruta;
                }
 
                //MULTIMEDIA -Se mostrara en la tablet-
                 //Verifica si no se selecciono multimedia lo asigna como nulo
                if ($request->file('media')==null) {
                  $multimedia=null;
                }
                else{ //Si se selecciono multimedia lo sube al servidor y guarda la ruta
                  $multimedia=$request->file('media')->store('img_tablet');
                  $multimedia="multimedia/".$multimedia;
                }
 
                //Ingresa una nueva pieza
                $pieza = new pieza; //Inicializa una nueva instancia del model pieza
                $pieza->cod_pieza = $request->codigopieza; //signa los nuevos datos
                $pieza->nombre = $request->nombrepieza;
                $pieza->fotografia = $ruta;
                $pieza->id_tipopieza = $request->idtipo;
                $pieza->save();
 
                //Obtiene el ID de la pieza ingresada
                $id="0"; //inicializa la variable id con valor cero
                $last_piece= pieza::orderBy('id','DESC')->take(1)->get(); //Obtiene la ultima pieza ingresada
                try {
                      foreach ($last_piece as $lp)
                      {
                        $id= $lp->id; //Obtiene el id de la ultima pieza ingresada
                      }
                    }
                catch (\Exception $e)
                    {
                        $id="0";
                    }
 
               //FICHA INFORMATIVA
                $fh = new fichas_informativa; //Inicializa una nueva instancia del modelo fichas_informativa
                $fh->historia = $request->historia; //asigna los nuevos valores
                $fh->multimedia = $multimedia;
                $fh->video= $request->urlvideo;
                $fh->epoca = $epoca;
                $fh->id_pieza = $id; //ID de la pieza ingresada arriba
                $fh->save();
 
                //FICHA TECNNICA
                $ft= new fichas_tecnica; //Inicializa una nueva instancia del modelo fichas_tecnica
                $ft->peso=$request->peso; //asigna los nuevos valores
                $ft->altura=$request->altura;
                $ft->ancho=$request->ancho;
                $ft->genero=$request->idgenero;
                $ft->idpieza=$id; //ID de la pieza ingresada arriba
                $ft->save();
 
                //ADQUISICION
                $user = Auth::user(); //Exrae los datos del empleado logeado actualmente
                $idemp=$user->empleado; //extrae el id del empleado
                $date = date ('Y-m-d'); //Fecha actual del sistema
 
                 //Verifica que tipo de adquisicion se selecciono
                 $tipoadquisicion = tipo_adquisicione::findOrFail($request->tipoadquisicion);
                 $tipo=$tipoadquisicion->nombre;
 
                 //Si se selecciono que la pieza sera heredada asigna un donante por defecto
                 //Este donante sera el mismo museo
                 if ($tipo=="Heredado")
                 {
                   $dondefect=3; //ID del donante por defecto
                   $adquisicione = new adquisicione; //Inicializa una nueva instancia del modelo adquisicione
                   $adquisicione->fecha = $date; //Asigna la fecha actual
                   $adquisicione->idpieza =$id; //ID de la pieza
                   $adquisicione->iddonante = $dondefect; //donante por defecto
                   $adquisicione->idempleado = $idemp; //Empleado actual logeado
                   $adquisicione->idtipoad = $request->tipoadquisicion;
                   $adquisicione->save();
 
                 }
                 else //Si el tipo de adquisision no es Heredado
                 {
                   $sino=$request->grp1; //radio buton si es nuevo donante o no
 
                     if ($sino=="si") //Si es un nuevo donante lo inserta
                     {
                       $donante = new Donante; //Inicializa una nueva instancia del modelo Donante
                       $donante->nombre =$request->uname; //Asigna los nuevos valores
                       $donante->apellido =$request->apellido;
                       $donante->telefono = $request->phone;
                       $donante->email = $request->email;
                       $donante->save();
                       //Busca el nuevo donante
                       $donanteG = Donante::where('nombre','=',$request->uname)
                                 ->orWhere('apellido','=',$request->apellido)
                                 ->select('donantes.id as id')
                                 ->get();
                       $idDonG=$donanteG[0]; //Extrae solo el campo del ID
                       $resultadoCidDon = intval(preg_replace('/[^0-9]+/', '', $idDonG), 10); //extrae el ID del nuevo donante
 
                       $adquisicione = new adquisicione; //Inicializa una nueva instancia del modelo adquisicione
                       $adquisicione->fecha = $date; //fecha atual del sistema
                       $adquisicione->idpieza =$id ; //ID de la nueva pieza
                       $adquisicione->iddonante = $resultadoCidDon; //ID del nuevo donante
                       $adquisicione->idempleado = $idemp; //Empleado actualmente logeado
                       $adquisicione->idtipoad = $request->tipoadquisicion;
                       $adquisicione->save();
                     }
                     else //si no es un nuevo donante
                      {
                         $adquisicione = new adquisicione; //Inicializa una nueva instancia del modelo adquisicione
                         $adquisicione->fecha = $date; //fecha atual del sistema
                         $adquisicione->idpieza =$id; //ID de la nueva pieza
                         $adquisicione->iddonante =$request->iddonanteC; //ID del donante existente
                         $adquisicione->idempleado = $idemp;
                         $adquisicione->idtipoad = $request->tipoadquisicion;
                         $adquisicione->save();
                      }
                  } //Fin else si el tipo de adquisision no es Heredado
                $mes="Ingreso correcto"; //Si todo esta correcto cambia el mensaje a ingeso correcto
              }
              // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
              catch (\Exception $e)
              {
                      DB::rollback(); //si hubo un fallo retrocede toda la transaccion
                      $mes=$e->getMessage(); //Extrae el mensaje de error
              }
 
              DB::commit(); //Realiza el commit de la transaccion
 
              if ($mes!="Ingreso correcto") { //Si es el mensaje retornado no es igual a ingreso correcto muestra un manesaje de error
                alert()->error(''.$mes.'', 'Error');
                return redirect('Pieza/create');
              }
              else{ //Si el mensaje es igual a ingreso correcto muestra un mensaje satistactorio
                alert()-> success(''.$mes.'','pieza');
               return redirect('Pieza/create');
              }
    }

  
    public function show()
    {
      $pieza = pieza::all();
      return view('pieza.list_edit',['piezas' => $pieza]);
    }

    public function edit($pieza)
    {
      $genero=genero::all();
      $tpieza=tipo_pieza::all();
      $p=pieza::findOrFail($pieza);

      $fi= fichas_informativa::where('id_pieza', $pieza)->get();
      $ft= fichas_tecnica::where('idpieza', $pieza)->get();
      return view('pieza.edit',compact('p','fi','ft','tpieza','genero'));
    }

    public function update(Request $request, $pieza)
    {
      $this->validate($request, [
        'nombrepieza' => 'required',
        'idtipo' => 'required',
        'idgenero' => 'required',
        'tipoadquisicion' => 'required',
       ]);
 
         //Modificar imagen
         $ruta=$request->nfoto; //Ruta actual de la foto que fue enviada desde el formulario por un input oculto
         if (isset($request->foto)) { //Si se selecciono una imagen
           $ruta=$request->file('foto')->store('img_navegador'); //Sube la nueva fotografia
           $ruta="multimedia/".$ruta; //Crea la ruta
           File::delete($request->nfoto); //Elimina la fotografia actual
         }
 
         //Verificar si se activa o desactiva la pieza
        $act=0;
        if ($request->si == true ) { //si el checkbox esta checkeado
            $act=1; //pieza activa
        }
        elseif($request->si == false){ //si el checkbox esta descheckeado
            $act=0; //pieza desactivada
        }
 
        //Actualiza los datos de la ficha informativa donde el id del apieza sea igual al ID $pieza
         $fi= fichas_informativa::where('id_pieza', $pieza)
           ->update(['epoca' => $request->epoca,'historia' => $request->historia]);
 
           //Actualiza los datos de la ficha tecnica donde el id del apieza sea igual al ID $pieza
         $ft= fichas_tecnica::where('idpieza', $pieza)
           ->update(['peso' => $request->peso,'altura' => $request->altura,
             'ancho' => $request->ancho,'genero' => $request->idgenero]);
 
             //Actualiza los campos de la pieza
         $pieza = pieza::find($pieza);
         $pieza->nombre =$request->nombrepieza;
         $pieza->id_tipopieza =$request->idtipo;
         $pieza->activo =$act;
         $pieza->fotografia =$ruta;
         $pieza->save();
 
         alert()-> success('Se actualizaron los campos','pieza');
         return redirect('Pieza/list');
    }

    public function destroy($id)
    {
      $fi= fichas_informativa::where('id_pieza', $id);
      $ft= fichas_tecnica::where('idpieza', $id);
      $piza= pieza::find($id);
      $ad= adquisicione::where('idpieza', $id);
      $fi->delete();
      $ft->delete();
      $ad->delete();
      $piza->delete();
      alert()-> success('eliminada','pieza');
      return back();
    }
}
