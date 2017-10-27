@extends('templates.home')
  @section('content')
    <div class="container">

      <div class="row">

        <div class="center"><br>

          <h5 class="light">Registro de Eventos</h5>

        </div>

      </div>
    <div class="card z-depth-4">

      <div class="card-image">

        <a href="{{route('Evento.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>

      </div>
      <div class="container">

			  <div class="row">
  
          <form id="formValidate" method="POST" action="{{route('Evento.store')}}"><br>
           {{ csrf_field() }}
           {{ method_field('POST') }}
          <div class="row">
          
          <div class="input-field col s6">
            <i class="material-icons prefix">bookmark_border</i>
            <input id="icon_prefix" type="text"  name="nombre" data-length="30" autocomplete="off" class="required" >
            @if ($errors->has('nombre'))
                <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
            <label for="icon_prefix">Nombre</label>

          </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">assignment</i>
              <input id="icon_prefix" type="text"  name="desc" data-length="100" autocomplete="off" class="required" >
              @if ($errors->has('desc'))
                  <span class="help-block" style="color:red;">
                      <strong>{{ $errors->first('desc') }}</strong>
                  </span>
              @endif
              <label for="icon_prefix">Descripcion</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">date_range</i>
                <input name="fechai" type="text" class="datepicker required">
                <label for="dateone">Fecha inicial</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">date_range</i>
                <input name="fechaf" type="text" class="datepicker required">
                <label for="dateone">Fecha final</label>
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
    <i class="medium material-icons">account_balance</i>
    <p><strong>Eventos:</strong><br>
    Acontecimientos, especialmente si son de cierta importancia.</p>
  </div>
@endsection