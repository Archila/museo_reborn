@extends('layout.home')
@section('title', 'NuevoLibro')
@section('content')
<div class="container">
  <div class="row">
    <div class="center">
      <h5 class="light">Nuevo libro</h5>
    </div>
  </div>
    <div class="col s12 card z-depth-4"> <!-- Borde -->
      <div class="card-image">
		    <!--  <a href="{{route('Libro.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light light-blue accent-4" data-position="bottom"
         data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>-->
		  </div>
      <div class="row">
        <!-- FORMULARIO DE PIEZAS -->
        <form method="POST" action="{{route('Libro.store')}}" class="col s12" id="formValidate">
          {!! csrf_field() !!}
            <div class="row"> <!-- INFORMACION GENERAL PIEZA -->
              <div class="input-field col s6">
                <i class="material-icons prefix">bookmark</i>
                <input id="" name="nombrelibro" type="text" class="required">
                <label for="uname">Nombre de libro</label>
              </div>
              <div class="input-field col s5">
                <i class="material-icons prefix">face</i>
                <select name="autor" class=" required_option">
                  <option value="" disabled selected>Eliga el autor</option>
                  @foreach($autores as $autor)
                  <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                  @endforeach
                </select>
                <label>Autor</label>
              </div>
              <div class="input-field col s1">
                <a class="tooltipped  btn-floating btn-small  blue modal-trigger" data-position="bottom" href="#modalautor" data-delay="50" data-tooltip="Agregar autor"><i class="material-icons">add</i></a>
              </div><br>
              <div class="row col s12">
              <div class="input-field col s3">
                <i class="material-icons prefix">collections_bookmark</i>
                <input  id="" name="edicion" type="text" >
                <label for="uname">Edicion</label>
              </div>
              <div class="input-field col s3 offset-s1 ">
                <i class="material-icons prefix">date_range</i>
                <input id="" name="anio" type="text" class="required cnumber">
                <label for="uname">Año</label>
              </div>
              <div class="input-field col s3 offset-s1 ">
                <i class="material-icons prefix">pages</i>
                <input id="" name="paginas" type="text" class="required cnumber">
                <label for="uname">Paginas</label>
              </div>
              </div>
              <div class="row col s12">
                <div class="input-field col s5">
                  <i class="material-icons prefix">bookmark_border</i>
                  <select name="editorial" class=" required_option">
                    <option value="" disabled selected>Eliga la editorial</option>
                    @foreach($editoriales as $editorial)
                    <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                    @endforeach
                  </select>
                  <label>Editorial</label>
                </div>
                <div class="input-field col s1">
                  <a class="tooltipped  btn-floating btn-small  blue modal-trigger" data-position="bottom" href="#modaleditorial" data-delay="50" data-tooltip="Agregar editorial"><i class="material-icons">add</i></a>
                </div>
                <div class="input-field col s5">
                  <i class="material-icons prefix">library_books</i>
                  <select name="categoria" class=" required_option">
                    <option value="" disabled selected>Eliga la categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                  </select>
                  <label>Categoria</label>
                </div>
                <div class="input-field col s1">
                  <a class="tooltipped  btn-floating btn-small  blue modal-trigger" data-position="bottom" href="#modalcategoria" data-delay="50" data-tooltip="Agregar categoria"><i class="material-icons">add</i></a>
                </div>
              </div>
              <div class="input-field col s12 center">
                <button class="btn blue waves-effect waves-light" type="submit" name="action">
                  <i class="material-icons right">send</i>Agregar
                </button>
              </div>
            </div>
      </form>
    </div>
  </div>

  <form action="{{route('Categoria.store')}}" method="POST" id="formValidate">
    {!! csrf_field() !!}
        <div id="modalcategoria" class="modal">
          <div class="modal-content">
            <div class="row">
              <div class="center">
                <h5 class="light">Nueva categoria de libros</h5>
              </div>
            </div>

            <div class="row"> <!-- INFORMACION GENERAL PIEZA -->
              <div class="input-field col s5 offset-s3">
                <i class="material-icons prefix">mode_edit</i>
                <input id="" name="categoria" type="text" class="required">
                <label for="uname">Nombre de categoria</label>
              </div>
              <div class="input-field col s12 center">
                <button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
                  <i class="material-icons right">send</i>Agregar
                </button>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <p class="left light">Nota: los datos que ingresados en el formulario de nuevo libro se perderan</p>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          </div>
        </div>
  </form>
  <form action="{{route('Editorial.store')}}" method="POST" id="formValidate">
    {!! csrf_field() !!}
        <div id="modaleditorial" class="modal">
          <div class="modal-content">
            <div class="row">
              <div class="center">
                <h5 class="light">Nueva editorial</h5>
              </div>
            </div>

            <div class="row"> <!-- INFORMACION GENERAL PIEZA -->
              <div class="input-field col s5 offset-s3">
                <i class="material-icons prefix">mode_edit</i>
                <input name="nombreeditorial" type="text" class="required">
                <label for="uname">Nombre de la editorial</label>
              </div>
              <div class="input-field col s12 center">
                <button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
                  <i class="material-icons right">send</i>Agregar
                </button>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <p class="left light">Nota: los datos que ingresados en el formulario de nuevo libro se perderan</p>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          </div>
        </div>
  </form>
  <form action="{{route('Autor.store')}}" method="POST" id="formValidate">
    {!! csrf_field() !!}
        <div id="modalautor" class="modal">
          <div class="modal-content">
            <div class="row">
              <div class="center">
                <h5 class="light">Nuevo autor</h5>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s4">
                <i class="material-icons prefix">mode_edit</i>
                <input name="autor" type="text" class="required">
                <label for="uname">Nombre de autor</label>
              </div>
              <div class="input-field col s12">
               <i class="material-icons prefix">description</i>
                <textarea name="bibliografia" class="materialize-textarea" length="120"></textarea>
                <label for="message">Bibliografia</label>
              <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
              </div>
              <div class="input-field col s12 center">
                <button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
                  <i class="material-icons right">send</i>Agregar
                </button>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <p class="left light">Nota: los datos que ingresados en el formulario de nuevo libro se perderan</p>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          </div>
        </div>
  </form>
</div>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
@section('section')
  <div class="center">
    <i class="medium material-icons">book</i>
    <p><strong>Nuevo libro:</strong>En esta seccion podra agregar un nuevo libro que este disponible en la biblioteca</p>
  </div>
@endsection
