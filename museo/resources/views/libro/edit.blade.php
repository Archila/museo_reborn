@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="center">
      <h5 class="light">Edición de libro</h5>

    </div>
  </div>
    <div class="col s12 card z-depth-4"> <!-- Borde -->
      <div class="card-image">
		    <a href="{{route('Libro.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom"
         data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
		  </div>
      <div class="row">
        <!-- FORMULARIO DE PIEZAS -->

              @foreach ($libros as $libro)
              <form method="POST" action="{{route('Libro.update',$libro->id)}}" class="col s12" id="formValidate"><br>
                <input name="_method" type="hidden" value="PUT">
                {!! csrf_field() !!}  {{ method_field('PUT') }}

              <div class="input-field col s4">
                <i class="material-icons prefix">bookmark</i>
                <input id="" name="nombrelibro" type="text" value="{{$libro->nombre}}" class="required">
                <label for="uname">Nombre de libro</label>
              </div>

              <div class="input-field col s4">
                <i class="material-icons prefix">face</i>
                <select name="autor" class=" required_option">
                  @foreach($autores as $autor)
                  @if ( ($libro->idautor) == ($autor->id))
                  <option value="{{$autor->id}}" selected>{{$autor->nombre}}</option>
                  @else
                  <option value="{{$autor->id}}" >{{$autor->nombre}}</option>
                  @endif
                  @endforeach
                </select>
                <label>Autor</label>
              </div>


                <div class="input-field col s4">
                  <i class="material-icons prefix">collections_bookmark</i>
                  <input  id="" name="edicion" type="text" value="{{$libro->edicion}}">
                  <label for="uname">Edición</label>
                </div>
                <div class="input-field col s4">
                  <i class="material-icons prefix">date_range</i>
                  <input id="" name="anio" type="text" value="{{$libro->anio}}" class="required cnumber">
                  <label for="uname">Año</label>
                </div>
                <div class="input-field col s4">
                  <i class="material-icons prefix">pages</i>
                  <input id="" name="paginas" type="text" value="{{$libro->paginas}}" class="required cnumber">
                  <label for="uname">Páginas</label>
                </div>


                <div class="input-field col s4">
                  <i class="material-icons prefix">bookmark_border</i>
                  <select name="editorial" class=" required_option">
                    @foreach($editoriales as $editorial)
                    @if ( ($libro->ideditorial) == ($editorial->id))
                    <option value="{{$editorial->id}}" selected>{{$editorial->nombre}}</option>
                    @else
                    <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                    @endif
                    @endforeach
                  </select>
                  <label>Editorial</label>
                </div>

                <div class="input-field col s4">
                  <i class="material-icons prefix">library_books</i>
                  <select name="categoria" class=" required_option">
                    @foreach($categorias as $categoria)
                    @if ( ($libro->idcategoria) == ($categoria->id))
                    <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                    @else
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endif
                    @endforeach
                  </select>
                  <label>Categoría</label>
                </div>


              <div class="input-field col s12 center">
                <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">
                  Actualizar
                </button>
              </div>


      </form>
        @endforeach
    </div>
  </div>
</div>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">book</i>
    <p><strong>Nuevo libro:</strong><br>
    Edición de libros disponibles en la bilbioteca</p>
  </div>
@endsection
