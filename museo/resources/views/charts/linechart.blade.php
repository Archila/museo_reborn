@extends('templates.home')

  @section('content')

<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
@endsection
@section('sections')
  <div class="center">
    <i class="large medium material-icons">equalizer</i>
    <p><strong>Ventas:</strong><br>
    Representacion grafica de el total de ventas en un año calendario catalogado por meses.</p>
  </div>
@endsection
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
$(document).ready(function () {

    Highcharts.chart('chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Ventas recaudadas en el Año {{$fecha}}'
    },
    
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
    yAxis: {
        title: {
            text: 'Quetzales Q'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
       
            
        name: 'Ventas',
        
       
        data: [
            @foreach($data as $d)
            {{$d->Ventas}},
            @endforeach
            ] 
        
           
    }, ]
});
});
</script>
