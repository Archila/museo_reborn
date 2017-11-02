@extends('templates.home')
  
@section('content')


<div class="row">

  <div class="col s3">
    <div class="card hoverable z-depth-1">  
      
      <div class="card-content">
        <h5 class="header center-align  cyan-text text-darken-4">Visitantes</h5> 
      </div>
  
      <div class="row">
        <div class="col s10 offset-s1 divider  blue-grey darken-3"></div>
      </div>
  
      <div class="row valign-wrapper">
        <div class="col s3">
         <a href="{{route('boletos.index')}}"><i  class="medium material-icons circle responsive-img blue-grey-text text-darken-3">portrait </i></a>
        </div>
        <div class="col s9 right-align">
          <h4 class="header center-align blue-grey-text text-darken-3">@foreach($visitantes as $v) {{$v->total}}@endforeach</h4>
        </div>
      </div> 
    </div>
  </div> 
  <div class="col s3">
    <div class="card hoverable z-depth-1">  
      
      <div class="card-content">
        <h5 class="header center-align  cyan-text text-darken-4">Piezas</h5> 
      </div>
  
      <div class="row">
        <div class="col s10 offset-s1 divider  blue lighten-4"></div>
      </div>
  
      <div class="row valign-wrapper">
        <div class="col s3">
         <a href="{{route('Pieza.index')}}"><i class="medium material-icons circle responsive-img blue-grey-text text-darken-3">account_balance </i></a>
        </div>
        <div class="col s9 right-align">
          <h4 class="header center-align blue-grey-text text-darken-3">@foreach($piezas as $p) {{$p->total}}@endforeach</h4>
        </div>
      </div> 
    </div>
  </div> 
  <div class="col s3">
    <div class="card hoverable z-depth-1">  
      
      <div class="card-content">
        <h5 class="header center-align  cyan-text text-darken-4">Libros</h5> 
      </div>
  
      <div class="row">
        <div class="col s10 offset-s1 divider  blue lighten-4"></div>
      </div>
  
      <div class="row valign-wrapper">
        <div class="col s3">
         <a href="{{route('Libro.index')}}"><i class="medium material-icons circle responsive-img blue-grey-text text-darken-3">collections_bookmark </i></a> 
        </div>
        <div class="col s9 right-align">
          <h4 class="header center-align blue-grey-text text-darken-3">@foreach($libros as $li) {{$li->total}}@endforeach</h4>
        </div>
      </div> 
    </div>
  </div> 
  <div class="col s3">
    <div class="card hoverable z-depth-1">  
      
      <div class="card-content">
        <h5 class="header center-align  cyan-text text-darken-4">Eventos</h5> 
      </div>
  
      <div class="row">
        <div class="col s10 offset-s1 divider  blue lighten-4"></div>
      </div>
  
      <div class="row valign-wrapper">
        <div class="col s3">
         <a href="{{route('Evento.index')}}"><i class="medium material-icons circle responsive-img blue-grey-text text-darken-3">event </i></a> 
        </div>
        <div class="col s9 right-align">
          <h4 class="header center-align blue-grey-text text-darken-3">@foreach($eventos as $e) {{$e->total}}@endforeach</h4>
        </div>
      </div> 
    </div>
  </div> <br>

  <div class="row">
  <div id="chartone" class="col s9" ></div>
  <div class="col s3">
    <table class="highlight responsive-table">
      <thead class="cyan-text text-darken-4 ">
            <tr>
                <th>Tarifa</th>
                <th>Monto</th>
                
            </tr>
          </thead>

          <tbody class="centered">
          @foreach($tarifa as $t)
            <tr>
              <td>{{$t->tarifa}}</td>
              <td>Q. {{$t->monto}}</td>
              
            </tr>
            @endforeach
            
        </tbody>
    </table>
  </div>
  
  </div>
  <div class="row">
  <div id="chartwo" class="col s6">
  
  </div>
  <div id="charthree" class="col s6">
  
  </div>
  </div>
 
  
  

</div>
 
  
  
 


     
@endsection
  
<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{URL::asset('bin/highcharts.js')}}"></script>
<script src="{{URL::asset('bin/exporting.js')}}"></script>

    <script>
$(document).ready(function () {

  Highcharts.chart('chartone', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Ventas recaudadas en el Año {{$fecha2}}'
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
            @foreach($chartone as $v)
            {{$v->Ventas}},
            @endforeach
            ] 
        
           
    }, ]
});
Highcharts.chart('chartwo', {
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
            @foreach($chartwo as $c2)
            {
                
                name: '{{$c2->tarifa}}',
                y: {{$c2->total}},
                sliced: true,
            },
            @endforeach
              ]
        }]
    });

    var chart = Highcharts.chart('charthree', {

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
      @foreach($charthree as $c3)
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
@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Eventos:</strong><br>
    Acontecimientos, especialmente si son de cierta importancia.</p>
  </div>
@endsection