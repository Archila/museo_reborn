@extends('templates.home')

@section('content')
  <div class="row">
    <div class="center">
      <h5 class="light">Editar genero</h5>
    </div>
  </div>
  <div class="row">
    <div class="center">

         <div class="col s6 card z-depth-4 offset-s3"> <!-- Borde -->
           <div class="card-image">
		           <a href="{{route('Genero.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light light-blue accent-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
		       </div>
           <div class="row">
             <!-- FORMULARIO DE PIEZAS -->
             <form method="POST" action="{{route('Genero.update',$genero->id)}}" class="col s12" id="formValidate">
               <input name="_method" type="hidden" value="PUT">
               {!! csrf_field() !!}
                 <div class="row"> <!-- INFORMACION GENERAL PIEZA -->
                   <div class="input-field col s5 offset-s3">
                     <i class="material-icons prefix">mode_edit</i>
                     <input name="nombregenero" type="text" value="{{$genero->genero}}" class="required">
                     <label for="uname">Nombre del genero</label>
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
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
@section('section')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Tipo de pieza:</strong>Es una categoria de donde pertenece la pieza. Ej: Pieza de ferrocarril pertenece al tipo Ferrocarril</p>
  </div>
@endsection