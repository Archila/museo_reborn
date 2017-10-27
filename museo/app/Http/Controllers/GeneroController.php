<?php

namespace App\Http\Controllers;

use App\genero;
use App\pieza;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
   
    public function index()
    {
        $result=genero::all();
        return view('genero.index', compact('result'));
    }

    public function create()
    {
        return view('Genero.nuevogenero');
    }

    public function store(Request $request)
    {
        $genero = new genero;
        $genero->genero = $request->nombregenero;
        $genero->save();
        alert()-> success('Se ingeso correctamente','Genero');
        return back();
    }

    public function show($id)
    {
        $piezas = pieza::join('fichas_informativas','piezas.id',"=","fichas_informativas.id_pieza")
            ->join('fichas_tecnicas','piezas.id',"=","fichas_tecnicas.idpieza")
            ->where('activo', '!=', 0)
            ->where('genero', '=', $id)
            ->get();
        $genero=genero::find($id);
        return view('genero.show', compact('piezas','genero')); 
    }

    public function edit($id)
    {
        $genero=genero::findOrFail($id);
        return view('genero.edit',compact('genero'));
    }

    public function update(Request $request, $id)
    {
        $genero = genero::find($id);
        $genero->genero =$request->nombregenero;
        $genero->save();
  
        alert()-> success('Se actualizaron los campos','Genero');
        return redirect('Genero/');
    }

    public function destroy($id)
    {
        $genero = genero::find($id);
        $genero->delete();
        alert()-> success('Eliminado correctamente','Genero');
        return back();
    }
}
