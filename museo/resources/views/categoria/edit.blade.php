@extends('templates.home')

@section('content')
  <div class="row">
    <div class="center">
      <h5 class="light">Editar categoria de libros</h5>
    </div>
  </div>
  <div class="row">
    <div class="center">

         <div class="col s10 card z-depth-4 offset-s1"> <!-- Borde -->
           <div class="card-image">
		           <a href="{{route('Categoria.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
		       </div>
           <div class="row">
             <!-- FORMULARIO DE PIEZAS -->
             <form id="formValidate" method="POST" action="{{route('Categoria.update',$categoria->id)}}" class="col s12"><br><br>
               <input name="_method" type="hidden" value="PUT">
               {!! csrf_field() !!}
                 <div class="row"> <!-- INFORMACION GENERAL PIEZA -->
                   <div class="input-field col s7 offset-s2">
                     <i class="material-icons prefix">mode_edit</i>
                     <input class="required" id="" name="nombrecategoria" type="text" value="{{$categoria->nombre}}">
                     <label for="uname">Nombre de la categoria</label>
                   </div>
                   <div class="input-field col s12">
                     <button class="btn light-blue waves-effect waves-light  light-blue darken-4 center" type="submit" name="action">
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
@section('section')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Tipo de pieza:</strong>Es una categoria de donde pertenece la pieza. Ej: Pieza de ferrocarril pertenece al tipo Ferrocarril</p>
  </div>
@endsection
