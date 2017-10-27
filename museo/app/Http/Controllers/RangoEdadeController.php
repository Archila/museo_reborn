<?php

namespace App\Http\Controllers;

use App\rango_edade;
use Illuminate\Http\Request;


class RangoEdadeController extends Controller
{
    
    public function index()
    {
        $rangos = rango_edade::orderBy('id','DESC')->get();
        return view('rangos.index',compact('rangos'));
    }
    
    public function show()
    {
        return redirect()->route('rangos.index');
    }
    public function destroy($id)
    {
        $rango = rango_edade::find($id);
        $rango -> delete();
        alert()->success('Rango', 'Eliminado');
        return back();
    }

    public function edit($id)
    {
        $rango = rango_edade::find($id);
        return view('rangos.edit', compact('rango'));
    }

    
    public function create()
    {
        return view('rangos.create'); 
    }
    
    public function store(Request $request)
    {
        $rango = new rango_edade;
        $rango->nombre = $request->uname;
        $rango->save();
        alert()->success('Rango', 'Creado');
        return back();
    }
    public function update(Request $request, $id)
    {
        $rango = rango_edade::find($id);
        $rango->nombre = $request->name;
        $rango->save();
        alert()->success('Rango', 'Actualizado');
        return redirect()->route('rangos.index');
    }

    
}
