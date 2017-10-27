@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="center">
      <h5 class="light">Lista de piezas</h5>
    </div>
  </div>
@if(($piezas)==('[]'))
<h5 class=" center">No se han agregado piezas a la base de datos</h5>
@else

<div class="card z-depth-3 ">
<ul class="collection ">
  @foreach ($piezas as $pieza)
  @if ($pieza->activo ==1)
  <li class="collection-item avatar">
    <img src="{{URL::asset($pieza->fotografia)}}" alt="" class="circle">
    <span class="title">{{$pieza->nombre}}</span>
    <p><br>
    </p>
    <div class="secondary-content " >
      <a class="modal-trigger" href="{{route('FichaInformativa.show',$pieza->id)}}"><span class=" new badge " data-badge-caption="Ver Ficha"></span></a>
      <a class="modal-trigger" href="{{action('AsistenteController@generarQR',$pieza->cod_pieza)}}"><span class=" new badge green" data-badge-caption="Ver QR"></span></a>
      <a class="modal-trigger" href="{{route('Pieza.edit',$pieza->id)}}"><span class=" new badge blue" data-badge-caption="Editar"></span></a>
      <a class="modal-trigger" href="#modal{{$pieza->id}}"><span class="new badge red"  data-badge-caption="Eliminar"></span></a>

    </div>
  </li>
  @else
  <li class="collection-item avatar" style="background-color:#eceff1">
    <img src="{{URL::asset($pieza->fotografia)}}" alt="" class="circle">
    <span class="title">{{$pieza->nombre}}</span>
    <p>Esta pieza no se mostrara en el inventario<p ><i class="material-icons prefix">visibility_off</i><p><br>

    </p>
    <div class="secondary-content " >
      <a class="modal-trigger" href="{{route('FichaInformativa.show',$pieza->id)}}"><span class=" new badge " data-badge-caption="Ver Ficha"></span></a>
      <a class="modal-trigger" href="{{action('AsistenteController@generarQR',$pieza->cod_pieza)}}"><span class=" new badge green" data-badge-caption="Ver QR"></span></a>
      <a class="modal-trigger" href="{{route('Pieza.edit',$pieza->id)}}"><span class=" new badge blue" data-badge-caption="Editar"></span></a>
      <a class="modal-trigger" href="#modal{{$pieza->id}}"><span class="new badge red"  data-badge-caption="Eliminar"></span></a>
    </div>
  </li>
  @endif
  <form action="{{route('Pieza.destroy',$pieza->id)}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">
      <div id="modal{{$pieza->id}}" class="modal">
        <div class="modal-content">
          <h4 class="center-align">Desea eliminar la pieza? </h4>
          <center> <i class="center-align medium material-icons">error_outline</i></center>
          <p class="center-align">Nota: los cambios no pueden deshacerse </p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          <button  class="btn red" type="submit" name="action">Eliminar</button>
        </div>
      </div>
  </form>
  @endforeach
</ul>
</div>
</div>
@endif
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')
@endsection

@section('section')
<div class="center">
 <i class="medium material-icons">list</i>

<blockquote>
      En esta sección se muestra un listado general de todas la piezas
      y las opciones de eliminar y editar de cada una de ellas
    </blockquote>
 </div>
@endsection