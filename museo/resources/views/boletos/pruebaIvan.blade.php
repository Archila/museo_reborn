@extends('templates.home')

@section('content')

  <h1>Prueba de Iván Archila</h1>

  <?php

  use Mike42\Escpos;
  use Mike42\Escpos\Printer;
  use Mike42\Escpos\EscposImage;
  use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

  use Illuminate\Http\Request;

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
          $nombre = "Prueba Iván";
          $total = 5000;
          $rangoedad="Macho";

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

   ?>
@endsection

@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Boleto:</strong><br>
    Documento que se entrega a la persona interesada en el que se garantiza que esta ha realizado el pago por un servicio.</p>
  </div>
@endsection
