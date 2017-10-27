<?php

namespace App\Http\Controllers;

use App\fichas_informativa;
use App\pieza;
use Illuminate\Http\Request;

class FichasInformativaController extends Controller
{
   
    public function index()
    {
        //
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
        $pieza=pieza::find($id);
        $ficha =fichas_informativa::where('id_pieza', $id)->first();
        return view('fichainformativa.show')->with(['pieza'=>$pieza, 'ficha'=>$ficha]);
    }

    public function edit(fichas_informativa $fichas_informativa)
    {
        //
    }

    
    public function update(Request $request, fichas_informativa $fichas_informativa)
    {
        //
    }

    
    public function destroy(fichas_informativa $fichas_informativa)
    {
        //
    }
}
