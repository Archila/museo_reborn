<?php

namespace App\Http\Controllers;

use App\fichas_informativa;
use App\pieza;
use Illuminate\Http\Request;

class FichasInformativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  \App\fichas_informativa
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
     * @param  \App\fichas_informativa  $fichas_informativa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pieza=pieza::find($id);
      $ficha =fichas_informativa::where('id_pieza', $id)->first();
      return view('fichainformativa.show')->with(['pieza'=>$pieza, 'ficha'=>$ficha]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fichas_informativa  $fichas_informativa
     * @return \Illuminate\Http\Response
     */
    public function edit(fichas_informativa $fichas_informativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fichas_informativa  $fichas_informativa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fichas_informativa $fichas_informativa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fichas_informativa  $fichas_informativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(fichas_informativa $fichas_informativa)
    {
        //
    }
}
