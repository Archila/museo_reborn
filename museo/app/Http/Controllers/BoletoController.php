<?php

namespace App\Http\Controllers;

use App\boleto;
use App\tipo_visitantes;
use App\rango_edade;
use App\tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use App\datoscurioso;
use Illuminate\Support\Facades\DB;

class BoletoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitante = tipo_visitantes::all();
        $rango     = rango_edade::all();
        return view('boletos.index',compact('visitante','rango'));
    }
    public function findtarifa(Request $request,$param1,$param2)
    {   
        if($request->ajax()){
            $data=tarifa::towns($param1,$param2);
            return response()->json($data);
        }
        
         return response()->json($data);
   
    }
 
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
        
        if($request->ajax()){
            $boleto = new boleto;
            $boleto->fecha  = $request->fecha;
            $boleto->total  = $request->total;
            $totales = $request->total;
            $boleto->tarifa = $request->tarifa;
            $nombre = $request->nombre;
            $user = Auth::user(); //Exrae los datos del empleado logeado actualmente
            $boleto->usuario=$user->empleado; //extrae el id del empleado
            $boleto->save();

            $dator=datoscurioso::all()->random(1);
            $nombreD="";
            foreach($dator as $daton)
            {
                $nombreD=$daton->dato;
            }
            
            
            try {
                //Conector de windows para la impresora
                $connector = new WindowsPrintConnector("EPSON20");
                $printer = new Printer($connector); //se declara una nueva impresora que recibe el conector windows
        
                function title($printer, $str) {
                    $printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
                    $printer -> text($str);
                    $printer -> selectPrintMode();
                }
        
                                
                $fecha = date ('d-m-Y');
               
        
                $img = EscposImage::load("../public/images/LogoBoleto.png");
                $printer -> graphics($img);
                $printer -> setJustification(Printer::JUSTIFY_CENTER);
                $printer -> text("\n".$fecha."\n");
                $printer -> text("_______________________________________\n");
                title($printer,"\nBienvenido ".$nombre. "\n");
        
                
                title($printer, "\n Total Q.".$totales."\n \n");
                //QR pequeño en el centro
                $testStr = "http://museodehistoriaxela.com/";
                $printer -> qrCode($testStr);
                $printer -> text("-Visita nuestra página-\n");

                $printer -> text("\n"."¿Sabias qué? ".$nombreD."\n");
                $printer -> setJustification();
                $printer -> feed();
              
        
                $printer -> cut(); //Cortar papel
                $printer -> close(); //Cerrar impresora
        
              } catch (Exception $e) {
                echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
              }
              return response() ->json([
                "mensaje"=>"Boleto registrado"
            ]);

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function show(boleto $boleto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function edit(boleto $boleto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boleto $boleto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\boleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function destroy(boleto $boleto)
    {
        //
    }
}
