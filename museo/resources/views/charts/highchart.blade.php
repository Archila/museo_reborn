@extends('templates.home')

  @section('content')

<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
@endsection
@section('sections')
  <div class="center">
    <i class="large medium material-icons">pie_chart</i>
    <p><strong>Ventas por tarifa:</strong><br>
    Representacion grafica de un total de ventas catalogado por tarifas.</p>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total de ventas catalogadas por tarifa'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>Q.{point.y:.0f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Ventas',
            colorByPoint: true,
            data: [
            @foreach($data as $d)
            {
                
                name: '{{$d->tarifa}}',
                y: {{$d->total}},
                sliced: true,
            },
            @endforeach
              ]
        }]
    });
});
</script>