@extends('templates.home')
@section('content')
<div class="row">
  <div class="center">
    <h5 class="light">Editar tipo adquisicion</h5>
  </div>
</div>
<div class="row">
  <div class="center">
    <div class="col s6 card z-depth-4 offset-s3"> <!-- Borde -->
    <div class="card-image">
      <a href="{{route('Genero.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light light-blue accent-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
      <div class="row">
        <form method="POST" action="{{route('TipoAdquisicion.update',$tpadquisicion->id)}}" id="formValidate">
         {{ csrf_field() }}
         {{ method_field('PUT') }}
          <div class="row">
            <div class="input-field col s5 offset-s3">
              <i class="material-icons prefix">perm_identity</i>
              <input value="{{$tpadquisicion->nombre}}" id="icon_prefix" type="text"  name="uname" class="required">
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col s12">
              <button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
                <i class="material-icons right">update</i>Actualizar
              </button>
            </div>
          </div>
        </form>
    </div>
    </div>
  </div>
</div>
@endsection
@section('section')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Tipo de pieza:</strong>Es una categoria de donde pertenece la pieza. Ej: Pieza de ferrocarril pertenece al tipo Ferrocarril</p>
  </div>
@endsection