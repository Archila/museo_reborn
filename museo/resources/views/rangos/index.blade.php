@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="left"><br>
      <h5 class="light">Rangos</h5>
    </div>

    <div class="right"><br>
      <a href="#modal2" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card hoverable z-depth-2">
        <table class="centered highlight responsive-table">
          <thead class="light-blue darken-1 white-text">
            <tr>
              <th>Codigo</th>
              <th>nombre</th>
              <th>Fecha Creacion</th>
              <th>Actualizacion</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rangos as $rango)
              <tr>
                <td>{{$rango->id}}</td>
                <td>{{$rango->nombre}}</td>
                <td>{{$rango->created_at->format('d/m/Y')}}</td>
                <td>{{$rango->updated_at->format('d/m/Y')}}</td>
                <td>
                  <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom"  href="{{route('rangos.edit',$rango->id,$rango->nombre)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                  <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="#modal1" data-delay="50" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
                  <form action="{{route('rangos.destroy',$rango->id)}}" method="POST">
                    {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE">
                      <div id="modal1" class="modal">
                        <div class="modal-content">
                          <h4 class="center-align">Desea eliminar rango ?</h4>
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

  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Rango de Edades</h4>
      <form id="formValidate" class="col s12" method="POST" action="{{route('rangos.store')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">class</i>
            <input autocomplete="off" name="uname" id="icon_prefix" type="text" class="required">
            <label for="icon_prefix">Nombre</label>
          </div>
          <div class="input-field col s12 center-align">
            <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Agregar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection

@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Rangos:</strong><br> Clase que resulta de una clasificación de personas según el criterio en administracion.</p>
  </div>
@endsection
