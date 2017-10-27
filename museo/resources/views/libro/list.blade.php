@extends('templates.home')
@section('content')
<div class="container">
  <div class="row">
    <div class="left"><br>
      <h5 class="light text-light-blue text-darken-4">Editar libros</h5>
    </div>

  </div>
  @if(($libros)==('[]'))
  <h5 class=" center">No se ha agregado ningun libro la base de datos</h5>
  @else
  <div class="row">
    <div class="col s12">
      <div class="card">
        <table class="highlight bordered centered responsive-table">
        <thead class="blue accent-3 white-text">
            <tr>
              <th>Codigo</th>
              <th>Nombre libro</th>
              <th>Autor</th>
              <th>Editorial</th>
              <th>Categoria</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($libros as $libro)
              <tr>
                <td>{{$libro->id}}</td>
                <td>{{$libro->nombre}}</td>
                <td>{{$libro->aut}}</td>
                <td>{{$libro->edit}}</td>
                <td>{{$libro->cat}}</td>
                <td>
                <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4 modal-trigger" data-position="bottom" href="{{route('Libro.edit',$libro->id)}}" data-delay="50" data-tooltip="Editar libro"><i class="material-icons">edit</i></a>
                <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger" data-position="bottom" href="#modal{{$libro->id}}" data-delay="50" data-tooltip="Eliminar libro"><i class="material-icons">delete</i></a>
                </td>
              </tr>
              <form action="{{route('Libro.destroy',$libro->id)}}" method="POST">
                {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                    <div id="modal{{$libro->id}}" class="modal">
                      <div class="modal-content">
                        <h4 class="center-align">Desea eliminar el autor?</h4>
                        <center> <i class="center-align medium material-icons">error_outline</i></center>
                        <p class="center-align">Nota: los cambios no pueden deshacerse </p>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                        <button class="btn red" type="submit" name="action">Eliminar</button>
                      </div>
                    </div>
                </form>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endif
</div>


<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection

@section('section')
  <div class="center">
    <i class="medium material-icons">list</i>
    <p> Se muestra una lista de los libros existentes en el sistema y sus opciones de editar y eliminar</p>
  </div>
@endsection