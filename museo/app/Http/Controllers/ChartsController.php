<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\boleto;
use App\tarifa;
use Charts;

class ChartsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
  public function main()
  {
    $fecha      = date ('Y-m-d');
    $fecha2     = date ('Y');
    $visitantes = DB::table('boletos')->whereDate('boletos.fecha', '=', $fecha)->select(DB::raw('COUNT(*) as total'))->get();
    $piezas     = DB::table('piezas')->select(DB::raw('COUNT(*) as total'))->get();
    $libros     = DB::table('libros')->select(DB::raw('COUNT(*) as total'))->get();
    $eventos    = DB::table('eventos')->whereDate('eventos.fecha_inicial', '=', $fecha)->select(DB::raw('COUNT(*) as total'))->get();
    $tarifa     = DB::table('tarifas')
    ->join('tipo_visitantes','tarifas.tipov','=','tipo_visitantes.id')
    ->join('rango_edades','tarifas.rango','=','rango_edades.id')
    ->select(
      DB::raw("CONCAT(rango_edades.nombre,' ',tipo_visitantes.nombre)as tarifa"),
      'monto'
    )
    ->orderByRaw('monto DESC')
    ->get();

    $chartone = DB::table('boletos')
    ->join('tarifas', 'boletos.tarifa', '=', 'tarifas.id')
    ->join('rango_edades', 'tarifas.rango', '=', 'rango_edades.id')
    ->join('tipo_visitantes', 'tarifas.tipov', '=', 'tipo_visitantes.id')
    ->whereYear('boletos.fecha', '=', $fecha)
    ->select(
      DB::raw('Month(boletos.fecha) as Mes'),
      DB::raw('SUM(boletos.total) as Ventas'))

      ->groupBy('Mes')
      ->orderByRaw('Mes ASC')
      ->get();

    $chartwo = DB::table('boletos')
    ->join('tarifas', 'boletos.tarifa', '=', 'tarifas.id')
    ->join('rango_edades', 'tarifas.rango', '=', 'rango_edades.id')
    ->join('tipo_visitantes', 'tarifas.tipov', '=', 'tipo_visitantes.id')
    ->select(
      DB::raw('SUM(boletos.total) as total'),
      DB::raw("CONCAT(rango_edades.nombre,' ',tipo_visitantes.nombre) as tarifa"))
    ->groupBy('boletos.tarifa')
    ->get();

    $charthree = DB::table('piezas')
    ->join('tipo_piezas','piezas.id_tipopieza','=','tipo_piezas.id_tipo')
    ->select(
      DB::raw('COUNT(piezas.id) as Total'),
      'tipo_piezas.nombre as Nombre'
    )
    ->groupBy('tipo_piezas.nombre')
    ->get();



    return view('charts.index',compact('tarifa','visitantes','piezas','libros','eventos','chartone','fecha2','chartwo','charthree'));
  }

  public function Highchart(){
    $data = DB::table('boletos')
    ->join('tarifas', 'boletos.tarifa', '=', 'tarifas.id')
    ->join('rango_edades', 'tarifas.rango', '=', 'rango_edades.id')
    ->join('tipo_visitantes', 'tarifas.tipov', '=', 'tipo_visitantes.id')
    ->select(
      DB::raw('SUM(boletos.total) as total'),
      DB::raw("CONCAT(rango_edades.nombre,' ',tipo_visitantes.nombre) as tarifa"))
    ->groupBy('boletos.tarifa')
    ->get();
    return view('charts.highchart',['data'=>$data]);
  }
  public function LineChart()
  {
    $fecha = date ('Y');
    $data = DB::table('boletos')
    ->join('tarifas', 'boletos.tarifa', '=', 'tarifas.id')
    ->join('rango_edades', 'tarifas.rango', '=', 'rango_edades.id')
    ->join('tipo_visitantes', 'tarifas.tipov', '=', 'tipo_visitantes.id')

    ->whereYear('boletos.fecha', '=', $fecha)
    ->select(
      DB::raw('Month(boletos.fecha) as Mes'),
      DB::raw('SUM(boletos.total) as Ventas'))

      ->groupBy('Mes')
      ->orderByRaw('Mes ASC')
      ->get();
      return view('charts.linechart',['data'=>$data],['fecha'=>$fecha]);
  }
  public function Chartpieces()
  {
    $data = DB::table('piezas')
    ->join('tipo_piezas','piezas.id_tipopieza','=','tipo_piezas.id_tipo')
    ->select(
      DB::raw('COUNT(piezas.id) as Total'),
      'tipo_piezas.nombre as Nombre'
    )
    ->groupBy('tipo_piezas.nombre')
    ->get();
    return view('charts.pieces',['data'=>$data]);
  }
}
