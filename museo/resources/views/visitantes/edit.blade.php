@extends('templates.home')

@section('content')
<div class="container">
    <div class="row">
        <div class="left"><br>
            <h5 class="light">Categoria de visitantes</h5>
            <p class="caption">Nombre actual: {{$visitante->nombre}}</p>
        </div>
        
        <div class="right"><br>
            <a href="{{route('visitantes.index')}}" 
            class="modal-trigger btn-floating tooltipped btn-large wwaves-effect waves-light  light-blue darken-4" 
            data-position="bottom" data-delay="50" data-tooltip="Regresar">
            <i class="material-icons">arrow_back</i></a>
        </div>
    </div>

    <div class="row">
    
    <form id="formValidate" method="POST" action="{{route('visitantes.update',$visitante->id)}}">
    <input name="_method" type="hidden" value="PUT">
        {!! csrf_field() !!}  
        <div class="row">
        <div class="input-field col s6">
          <input value="{{$visitante->nombre}}" id="first_name" name="name" type="text" class="required" autocomplete="off">
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col s6">
        <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Actualizar</button>
        </div>
        </div>
        </form>
    </div>

</div>
@endsection