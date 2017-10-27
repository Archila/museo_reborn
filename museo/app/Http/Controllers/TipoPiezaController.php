<?php

namespace App\Http\Controllers;

use App\tipo_pieza;
use App\pieza;
use Illuminate\Http\Request;

class TipoPiezaController extends Controller
{
    public function index()
    {
        $result=tipo_pieza::all();
        return view('tipopieza.index', compact('result'));
    }

    public function create()
    {
        return view('tipopieza.nuevotipopieza');
    }

    public function store(Request $request)
    {
        $tp = new tipo_pieza;
        $tp->nombre = $request->nombretipo;
        $tp->save();
        alert()-> success('Se ingeso correctamente el nuevo tipo','Tipo de pieza');
       return back();
    }

    public function show($id)
    {
        $piezas = pieza::join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
        ->where('activo', '!=', 0)
        ->where('id_tipopieza', '=', $id)
        ->get();
        $tipo=tipo_pieza::where('id_tipo', '=', $id)->get();
        return view('tipopieza.show', compact('piezas','tipo'));
    }

    public function edit($id)
    {
        $tpieza=tipo_pieza::where('id_tipo',$id)->get();
        return view('tipopieza.edit',compact('tpieza'));
    }

   public function update(Request $request, $id)
    {
        $tpieza= tipo_pieza::
            where('id_tipo', $id)
            ->update(
            ['nombre' => $request->nombretipo]);
        alert()-> success('Se actualizaron los campos','Tipo de pieza');
        return redirect('TipoPieza/');
    }

    public function destroy($id)
    {
        $tp= tipo_pieza::where('id_tipo', $id);
        $tp->delete();
        alert()-> success('Eliminado correctamente','Tipo de pieza');
        return back();
    }
}
