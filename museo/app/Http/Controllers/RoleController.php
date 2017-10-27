<?php

namespace App\Http\Controllers;

use App\role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $rol=new role;
        $rol->nombre=$request->nombre;
        $rol->desc=$request->desc;
        $rol->save();
        alert()->success('Transaccion', 'Registro Exitoso');
        return back();
    }

    public function show(role $role)
    {
        //
    }

    public function edit(role $role)
    {
        //
    }

    public function update(Request $request, role $role)
    {
        //
    }

    public function destroy(role $role)
    {
        //
    }
}
