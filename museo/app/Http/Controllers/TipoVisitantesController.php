<?php

namespace App\Http\Controllers;

use App\tipo_visitantes;
use Illuminate\Http\Request;

class TipoVisitantesController extends Controller
{
    
    public function index()
    {
        $visitantes = tipo_visitantes::orderBy('id','ASC')->get();
        return view('visitantes.index',compact('visitantes'));
    }

    
    public function create()
    {
        return view('visitantes.create'); 
    }

    
    public function store(Request $request)
    {
        $visitante = new tipo_visitantes;
        $visitante->nombre = $request->uname;
        $visitante->save();
        alert()->success('Visitante', 'Creado');
        return back();
    }

    
    public function show()
    {
        return redirect()->route('visitantes.index');
    }

    
    public function edit($id)
    {
        $visitante = tipo_visitantes::find($id);
        return view('visitantes.edit', compact('visitante'));
    }

    
    public function update(Request $request, $id)
    {
        $visitante = tipo_visitantes::find($id);
        $visitante->nombre = $request->name;
        $visitante->save();
        alert()->success('Visitante', 'Actualizado');
        return redirect()->route('visitantes.index');
    }

   
    public function destroy($id)
    {
        $visitante = tipo_visitantes::find($id);
        $visitante -> delete();
        alert()->success('Visitante', 'Eliminado');
        return back();
    }
}
