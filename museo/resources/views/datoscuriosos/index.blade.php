@extends('templates.home')
  
  @section('content')
    <div class="container">

      <div class="row">
        <div class="left"><br>
          <h5 class="light text-light-blue text-darken-4">Datos Curiosos</h5>
        </div>
        <div class="right"><br>
          <a href="#modaln" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <div class="card hoverable">
            <table class="bordered centered responsive-table">
              <thead class="light-blue darken-1 white-text">
                <tr>
                  <th>Dato</th>
                  <th>Fecha Creacion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($datos as $dato)
                <tr>
                  <td>{{$dato->dato}}</td>
                  <td>{{$dato->created_at}}</td>
                  <td>
                    <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom"  href="{{route('DatoCurioso.edit',$dato->id)}}" data-delay="50" data-tooltip="Editar tipo"><i class="material-icons">edit</i></a>
                    <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="#modal{{$dato->id}}" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>
              
                  </td>
                  <form action="{{route('DatoCurioso.destroy',$dato->id)}}" method="POST">
              {{csrf_field()}}
              {{ method_field('DELETE') }}
                  <div id="modal{{$dato->id}}" class="modal">
                    <div class="modal-content">
                      <h4 class="center-align">Desea eliminar?</h4>
                      <center> <i class="center-align medium material-icons">error_outline</i></center>
                      <p class="center-align">Nota: los cambios no pueden deshacerse </p>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                      <button class="btn red" type="submit" name="action">Eliminar</button>
                    </div>
                  </div>
            </form>
                </tr> 
                @endforeach 
              </tbody>
            </table>
          </div>
        </div>
      </div>        

    </div>



<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')

  <form id="formValidate" action="{{route('DatoCurioso.store')}}" method="POST">
    {{csrf_field()}}
    {{ method_field('POST') }}
      <div id="modaln" class="modal">
          <div class="modal-content">
            <h4 class="center-align">Registro de Dato Curiso</h4>
            <div class="row">
            
              <div class="input-field col s12">
                <i class="material-icons prefix">bookmark_border</i>
                <input id="icon_prefix" type="text"  name="dato" class="required" autocomplete="off" data-length="50"  >
                <label for="icon_prefix">Dato</label>
              </div>
              <div class="input-field col s12 center">
                <button class="btn  waves-effect waves-light  light-blue darken-4" type="submit" name="action">Enviar</button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancelar</a>  
          </div>
      </div>
  </form>
@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">plus_one</i>
    <p><strong>Datos Curiosos:</strong><br>
     Frases con funcion de registrar una anecdota sobre el museo del ferrocarril.</p>
  </div>
@endsection
