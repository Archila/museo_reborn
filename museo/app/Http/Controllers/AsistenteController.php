<?php

namespace App\Http\Controllers;
use App\User;
use App\pieza;
use App\fichas_informativa;

use Illuminate\Http\Request;

class AsistenteController extends Controller
{
    public function index()
    {
        $piezas = pieza::all();
    	return view('asistente.listado_piezas')->with('piezas',$piezas);
    }
    public function generarQR($cod)
    {
    	$cod_pieza = $cod;
		return view('asistente.crear_qr')->with('cod_pieza',$cod_pieza);
    }
    public function guardarQR(Request $request)
	{
		$cod_pieza = $request->input('cod_pieza'); //Codigo de la pieza
		$filename = $request->input('file'); //URL de la imagen del codgio QR
        $piece =pieza::where('cod_pieza', $cod_pieza)->select('piezas.id')->get(); //Selecciona la pieza donde el Codgio es igual al recibido

        $idpieza=0;
        foreach ($piece as $p)
        {      $idpieza= $p->id;}

            $pieza=pieza::find($idpieza);
        $pieza->codigo_qr =$filename;
        $pieza->save();
            return view('asistente.ver_qr')->with('pieza',$pieza);
    }
    public function ficha($id){
        $cod_pieza = $id;
        $pieza=\App\pieza::find($cod_pieza);
        $ficha =\App\fichas_informativa::where('pieza', $id)->first();
        return view('Asistente.ficha')->with(['pieza'=>$pieza, 'ficha'=>$ficha]);
     }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
