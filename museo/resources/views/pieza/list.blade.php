@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="center">
      <h5 class="light">Inventario de piezas</h5>
    </div>
  </div>
@if(($piezas)==('[]'))
<h5 class=" center">No se han agregado piezas a la base de datos</h5>
@else
<nav>
 <div class="nav-wrapper cyan darken-1">
    <a href="#!" class="brand-logo"><i class="material-icons">find_in_page</i>Busqueda de piezas</a>
   <ul class="right hide-on-med-and-down">
       <li >
         <ul id="dropdown" class="dropdown-content col s3 m2 l4">
           @foreach($tipos as $tipo)
           <li><a href="{{route('TipoPieza.show',$tipo->id_tipo)}}">{{$tipo->nombre}}</a></li>
           @endforeach
         </ul>
           <a class="btn dropdown-button" href="#!" data-activates="dropdown">Tipo de pieza<i class="material-icons right">arrow_drop_down</i></a>
       </li>
       <li>
         <ul id="dropdown2" class="dropdown-content">
           @foreach($generos as $genero)
           <li><a href="{{route('Genero.show',$genero->id)}}">{{$genero->genero}}</a></li>
           @endforeach
         </ul>
           <a class="btn dropdown-button" href="#!" data-activates="dropdown2">Genero<i class="material-icons right">arrow_drop_down</i></a>
       </li>
       <li>
         <ul id="dropdown3" class="dropdown-content">
           @foreach($tipoad as $ad)
           <li><a href="{{route('TipoAdquisicion.show',$ad->id)}}">{{$ad->nombre}}</a></li>
           @endforeach
         </ul>
           <a class="btn dropdown-button" href="#!" data-activates="dropdown3">Tipo adquisición<i class="material-icons right">arrow_drop_down</i></a>
       </li>
     </ul>

 </div>

 <div class="row">
   <div class="center">
 <div class="col s10 m8 l6 offset-s1 offset-s2 offset-l3 center">
     <nav>
       <div class="nav-wrapper teal darken-3">
           <div class="input-field">
             <input id="buscar" type="search" placeholder="Nombre de pieza, tipo de pieza, tipo de adquisición " >
             <label class="label-icon" for="search"><i class="material-icons prefix">search</i></label>
             <i class="material-icons">close</i>
           </div>
       </div>
     </nav>
 </div>
 </div>
 </div>
</nav>
<div id="historia" class="row section scrollspy">
  <section>
  </section>
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
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
		$(document).ready(function(){
        $value=$(this).val();
        $.ajax({
          type : 'get',
           url : '{{URL::to('buscarpieza')}}',
           data : {'search':$value},
           success:function(data){
             $('section').html(data);
           }
        });
buscarDon();
		});

</script>
<script>

function buscarDon()
{
  $('#buscar').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type : 'get',
       url : '{{URL::to('buscarpieza')}}',
       data : {'search':$value},
       success:function(data){
         $('section').html(data);
       }
    });
  })
}

</script>
@endsection
@section('section')
<blockquote>
      Lista ordenada de bienes y demás cosas valorables que pertenecen a una persona, empresa o institución.
</blockquote>
@endsection
