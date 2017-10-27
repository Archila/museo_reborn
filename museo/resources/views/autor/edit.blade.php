@extends('templates.home')

@section('content')
  <div class="row">
    <div class="center">
      <h5 class="light">Editar autor</h5>
    </div>
  </div>
  <div class="row">
    <div class="center">

         <div class="col s10 card z-depth-4 offset-s1"> <!-- Borde -->
           <div class="card-image">
		           <a href="{{route('Autor.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light light-blue accent-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
		       </div>
           <div class="row">
             <!-- FORMULARIO DE PIEZAS -->
             <form method="POST" action="{{route('Autor.update',$autor->id)}}" class="col s12" id="formValidate"><br>
             <input name="_method" type="hidden" value="PUT">
             {!! csrf_field() !!}  
                 <div class="row"> <!-- INFORMACION GENERAL PIEZA -->
                   <div class="input-field col s12">
                     <i class="material-icons prefix">mode_edit</i>
                     <input class="required" data-length="30" name="autor" autocomplete="off" type="text" value="{{$autor->nombre}}">
                     <label for="uname">Nombre del autor</label>
                   </div>
                   <div class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                     <textarea name="bibliografia" class="materialize-textarea required" data-length="120" >{{$autor->bibliografia}}</textarea>
                     <label for="bibliografia">Bibliografia</label>
                   <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                   </div>
                   <div class="input-field col s12">
                     <button class="btn aves-effect waves-light  light-blue darken-4 center" type="submit" name="action">
                      Actualizar
                     </button>
                   </div>
                 </div>
           </form>
           </div>
       </div>
  </div>
</div>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Tipo de pieza:</strong><br>
    Es una categoria de donde pertenece la pieza. Ej: Pieza de ferrocarril pertenece al tipo Ferrocarril</p>
  </div>
@endsection
