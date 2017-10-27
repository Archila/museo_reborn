@extends('templates.home')
@section('content')
<div class="container">

	<div class="row">

		<div class="center"><br>

			<h5 class="light">Edicion de Evento</h5>

		</div>

  </div>
  <div class="card z-depth-4">

		<div class="card-image">

		  <a href="{{route('Evento.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>

		</div>

    <div class="container">
  	  <div class="row">

        <form id="formValidate" method="POST" action="{{route('Evento.update',$evento->id)}}"><br>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          
          <div class="row">
            
            <div class=" col s12 center">

              <label for="icon_prefix">Activo</label>
                <div class="switch">
                  <input name="sino" id="sino" type="hidden" value="{{$evento->activo}}">
                  <label>
                  Off
                  @if ($evento->activo === 1)
                    <input onclick="activo()" name="mySwitch" id="mySwitch" type='checkbox' checked>
                  @elseif ($evento->activo== 0)
                    <input onclick="activo()" name="mySwitch" id="mySwitch" type='checkbox' >
                  @endif
                  <span class="lever"></span>
                  On
                </div>
              </label>
            </div>
            

          <div class="input-field col s6">
            <i class="material-icons prefix">bookmark_border</i>
            <input id="icon_prefix" type="text"  name="nombre" value="{{$evento->nombre}}" data-length="30" autocomplete="off" class="required">
            @if ($errors->has('nombre'))
                <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
            <label for="icon_prefix">Nombre</label>

          </div>

          <div class="input-field col s6">
            <i class="material-icons prefix">assignment</i>
            <input id="icon_prefix" type="text"  name="desc" value="{{$evento->descripcion}}" data-length="100" autocomplete="off" class="required">
              @if ($errors->has('desc'))
                  <span class="help-block" style="color:red;">
                      <strong>{{ $errors->first('desc') }}</strong>
                  </span>
              @endif
              <label for="icon_prefix">Descripcion</label>
          </div>
      
          <div class="input-field col s6">
            <i class="material-icons prefix">av_timer</i>
            <input id="icon_prefix" type="text" name="fechai" class="datepicker required" value="{{$evento->fecha_inicial}}">
            <label for="icon_prefix">Fecha inicial</label>
          </div>
          
          <div class="input-field col s6">
              <i class="material-icons prefix">av_timer</i>
              <input id="icon_prefix" type="text"  name="fechaf" class="datepicker required" value="{{$evento->fecha_final}}">
              <label for="icon_prefix" >Fecha final</label>
          </div>

          <div class="input-field col s12 center-align">
            <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Registrar
            </button>
          </div>

        </div>
        </form>
        </div>
        </div>
    </div>

</div>


        <script type="text/javascript">
    function activo()
    {
var checkbox = document.getElementById('mySwitch');
if (checkbox.checked==true)
 {
document.getElementById("sino").value =1 ;
}
else {
  document.getElementById("sino").value =0;
}

    }


        </script>
@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Eventos:</strong><br>
    Acontecimientos, especialmente si son de cierta importancia.</p>
  </div>
@endsection