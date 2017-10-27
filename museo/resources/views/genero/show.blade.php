@extends('templates.home')

@section('content')
<div class="row">
  <div class="center">

    <h5 class="light left">Piezas de género-</h5><h5 class="medium left">  {{ $genero->genero}} </h5>

  </div>
</div>
@if(($piezas)==('[]'))
<h5 class=" center">No se han agregado piezas a la base de datos</h5>
@else

<div id="historia" class="row section scrollspy">
@foreach ($piezas as $pieza)
<div class="col s6 m4 l3">
    <div class="card z-depth-2" style="overflow: visible;">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{URL::asset($pieza->fotografia)}}" WIDTH=100 HEIGHT=180>
              </div>
              <div class="card-content">

                <span class="caption activator grey-text text-darken-4">{{$pieza->nombre}}<i class="material-icons right">more_vert</i></span>
                <p><a href="#!">{{$pieza->epoca}}</a></p>
              </div>
              <div class="card-reveal" style="display: none; transform: translateY(0px);">
                <span class="card-title grey-text text-darken-4">Historia<i class="material-icons right">cerrar</i></span>
                <p>{{$pieza->historia}}</p>
              </div>
            </div>
  </div>
  @endforeach
</div>
@endif

@endsection
@section('section')
<blockquote>
      Lista ordenada de bienes y demás cosas valorables que pertenecen a una persona, empresa o institución.
</blockquote>
@endsection
