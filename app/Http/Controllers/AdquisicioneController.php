<?php

namespace App\Http\Controllers;


use App\donante;

use App\adquisicione;

use App\tipo_adquisicione;
use App\pieza;
use App\empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdquisicioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\adquisicione  $adquisicione
     * @return \Illuminate\Http\Response
     */
    public function show(adquisicione $adquisicione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adquisicione  $adquisicione
     * @return \Illuminate\Http\Response
     */
    public function edit(adquisicione $adquisicione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adquisicione  $adquisicione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adquisicione $adquisicione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adquisicione  $adquisicione
     * @return \Illuminate\Http\Response
     */
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
