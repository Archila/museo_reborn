<?php

namespace App\Http\Controllers;

use App\adquisicione;
use App\donante;
use App\tipo_adquisicione;
use App\pieza;
use App\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdquisicioneController extends Controller
{
    
    public function index()
    {
        $adquisiciones =adquisicione::join('piezas', 'adquisiciones.idpieza', '=', 'piezas.id')
        ->join('donantes', 'adquisiciones.iddonante', '=', 'donantes.id')
        ->join('empleados', 'adquisiciones.idempleado', '=', 'empleados.id')
        ->join('tipo_adquisiciones', 'adquisiciones.idtipoad', '=', 'tipo_adquisiciones.id')
        ->select(
                'adquisiciones.fecha as fecha',
                'piezas.nombre  as pieza',
                'donantes.nombre as donante',
                'empleados.nombre as empleado',
                'tipo_adquisiciones.nombre as adquisiciones'
                )
        ->get();
       return view('adquisicion.index',compact('adquisiciones'));
    }

 
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }

   
    public function show(adquisicione $adquisicione)
    {
        //
    }

    
    public function edit(adquisicione $adquisicione)
    {
        //
    }

    public function update(Request $request, adquisicione $adquisicione)
    {
        //
    }

    
    public function destroy(adquisicione $adquisicione)
    {
        //
    }
    public function search(Request $request)
    {
      if ($request->ajax())
      {
     $output="";
      $donantes=DB::table('donantes')->where('nombre','LIKE','%'.$request->search.'%')
                                    ->orWhere('apellido','LIKE','%'.$request->search.'%')->get();

     $cont=1;
      if ($donantes)
       {
         foreach ($donantes as $key => $donantes)
          {
            $output.='<tr>'.
                       '<td>'.$donantes->id.'</td>'.
                       '<td>'.$donantes->nombre.'</td>'.
                       '<td>'.$donantes->apellido.'</td>'.
                       '<td>'.$donantes->telefono.'</td>'.
                       '<td>'.$donantes->email.'</td>'.
                       '<td>

                         <p>
                             <input name="grp2" value="'.$donantes->id.'" type="radio" id="'.$cont.'" onclick="capturarDonante()"/>
                             <label for="'.$cont.'"></label>
                         </p>'.
                       '</td>'.
                     '</tr>';
                     $cont++;
         }
         return Response($output);

       }
      }

    }
}
