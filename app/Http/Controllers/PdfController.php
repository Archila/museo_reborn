<?php

namespace App\Http\Controllers;
use App\User;
use App\pieza;
use App\fichas_informativa;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function crearPDF()
    {
        $piezas = \App\pieza::all();
        $fecha = date('d-m-Y');
        $view =  \View::make('prueba_pdf', compact('piezas', 'fecha'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $file = 'piezas.pdf';
        return $pdf->stream('piezas.pdf');
    }

    public function prueba()
    {
        $piezas = \App\pieza::all();
        $date = date('d-m-Y');
        return view('prueba_pdf')->with(['piezas'=>$piezas, 'fecha'=>$date]);
    }

    public function crearPDF_individual(Request $request)
    {
        $id = $request->cod_pieza;
        $piezas= pieza::find($id);
        $fecha = date('d-m-Y');
        $view =  \View::make('prueba_pdf', compact('piezas', 'fecha'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $file = 'pieza.pdf';
        return $pdf->stream('pieza.pdf');
    }
}
