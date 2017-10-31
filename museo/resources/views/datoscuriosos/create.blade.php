
@extends('templates.home')
  @section('content')
    <div class="container">
      <div class="row">
        <div class="center"><br>
          <h5 class="light">Registro de Dato Curioso</h5>
        </div>
      </div>
    <div class="card z-depth-4">
      <div class="card-image">
        <a href="{{route('DatoCurioso.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
      </div>
      <div class="container">
			  <div class="row">

          <form id="formValidate" method="POST" action="{{route('DatoCurioso.store')}}"><br>
           {{ csrf_field() }}
           {{ method_field('POST') }}
          <div class="row">

          <div class="input-field col s6">
            <i class="material-icons prefix">sms</i>
            <input id="icon_prefix" type="text"  name="dato" data-length="100" autocomplete="off" class="required" >
            @if ($errors->has('dato'))
                <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('dato') }}</strong>
                </span>
            @endif
            <label for="icon_prefix">Nombre</label>

          </div>

          </div>


            <div class="input-field col s12 center-align">
                <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Registrar
              </button>
            </div>
            </div><br>

                </form>
            </div>
        </div>
    </div>


@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">plus_one</i>
    <p><strong>Datos Curiosos:</strong><br>
     Frases con función de registrar una anecdota sobre el museo del ferrocarril.</p>
  </div>
@endsection
