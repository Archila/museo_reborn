<?php

namespace App\Http\Controllers;

use Mike42\Escpos;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use Illuminate\Http\Request;

class TestBoletoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try {
        //Conector de windows para la impresora
        $connector = new WindowsPrintConnector("EPSON20");
        $printer = new Printer($connector); //se declara una nueva impresora que recibe el conector windows

        function title($printer, $text) {
        	$printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
        	$printer -> text($text);
        	$printer -> selectPrintMode();
        }

        $fecha = date ('d-m-Y');
        $nombre = "Yordan";
        $total = 5;
        $rangoedad="niño";

        $img = EscposImage::load("../public/images/LogoBoleto.png"); //cargar la imagen
        $printer -> graphics($img); //imprime la imagen
        $printer -> setJustification(Printer::JUSTIFY_CENTER); //Centra el texto
        $printer -> text("\n".$fecha."\n"); //imprime la fecha del sistema
        $printer -> text("_______________________________________\n");
        title($printer, "Bienvenido "." ".$nombre."\n");
        $printer -> text("\n".$rangoedad."\n");
        title($printer, "Total Q.".$total."\n \n");
        //QR pequeño en el centro

        $printer -> qrCode("http://museodehistoriaxela.com/"); //Iprmir el codigo QR
        $printer -> text("-Visita nuestra página-\n");
        $printer -> setJustification();
        $printer -> feed();
        $printer -> cut(); //Cortar papel
        $printer -> close(); //Cerrar impresora

      } catch (Exception $e) {
        echo "No se pudo imprimir en la impresora: " . $e -> getMessage() . "\n";
      }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
