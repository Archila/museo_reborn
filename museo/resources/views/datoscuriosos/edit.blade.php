@extends('templates.home')
@section('content')
<div class="container">
  <div class="row">
      <div class="center">
        <h5 class="light">Edicion de Datos Curiosos</h5>  
      </div>
    
  </div>

<div class="col s12 card z-depth-4"> <!-- Borde -->
    <div class="card-image">
      <a href="{{route('DatoCurioso.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom"
      data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
  
  <div class="row">
    
    <form id="formValidate" method="POST" action="{{route('DatoCurioso.update',$dato->id)}}"><br>
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      
        <div class="input-field col s12">
          <i class="material-icons prefix">bookmark_border</i>
          <input id="icon_prefix" type="text"  name="dato" value="{{$dato->dato}}"  autofocus autocomplete="off" data-length="50" class="required">
            @if ($errors->has('dato'))
              <span class="help-block" style="color:red;">
                <strong>{{ $errors->first('dato') }}</strong>
              </span>
            @endif
            <label for="icon_prefix">Dato</label>
        </div>
        <div class="input-field col s12 center">
          <button class="btn waves-effect waves-light  light-blue darken-4"  type="submit">enviar</button>
        </div>
    
    </form>
  </div>
       </div>
        </div>
    

@endsection
@section('sections')
<div class="center">
  <i class="medium material-icons">plus_one</i>
  <p><strong>Datos Curiosos:</strong><br>
   Frases con funcion de registrar una anecdota sobre el museo del ferrocarril.</p>
</div>
@endsection
