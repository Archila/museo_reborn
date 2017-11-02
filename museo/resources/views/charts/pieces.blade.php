@extends('templates.home')

  @section('content')

<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
@endsection
@section('sections')
  <div class="center">
    <i class="large medium material-icons">equalizer</i>
    <p><strong>Piezas:</strong><br>
    Representacion grafica del total de piezas existentes divididas en sus categorias correspondientes.</p>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
$(document).ready(function () {

    var chart = Highcharts.chart('chart', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Numero de piezas por categoria'
    },

    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'vertical'
    },

    xAxis: {
        categories: ['Piezas'],
        labels: {
            x: -10
        }
    },

    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Amount'
        }
    },

    series: [
      @foreach($data as $c3)
      {
     
        name: '{{$c3->Nombre}}',
        data: [{{$c3->Total}},]
    },@endforeach ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                },
                yAxis: {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -5
                    },
                    title: {
                        text: null
                    }
                },
                subtitle: {
                    text: null
                },
                credits: {
                    enabled: false
                }
            }
        }]
    }
});
});
</script>