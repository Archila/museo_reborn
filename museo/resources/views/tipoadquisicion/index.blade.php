@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="left">
      <h5 class="light">Tipo de adquisición</h5>
    </div>
    <div class="right"><br>
      <a href="#modalcreate" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card">
        <table class="highlight bordered centered responsive-table">
          <thead class=" light-blue darken-4 white-text ">
            <tr>
              <th>Codigo</th>
              <th>Tipo de adquisición</th>
              <th></th>
            </tr>
          </thead>
        <tbody>
            @foreach ($tpadquisiciones as $tpadquisicion)
            <tr>
            <td>{{$tpadquisicion->id}}</td>
            <td>{{$tpadquisicion->nombre}}</td>
            <td>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4 modal-trigger" data-position="bottom" href="{{route('TipoAdquisicion.edit',$tpadquisicion->id)}}" data-delay="50" data-tooltip="Editar tipo"><i class="material-icons">edit</i></a>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger" data-position="bottom" href="#modal{{$tpadquisicion->id}}" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>
            </td>
            </tr>
            <form action="{{route('TipoAdquisicion.destroy',$tpadquisicion->id)}}" method="POST" >
              {{csrf_field()}}
              {{ method_field('DELETE') }}
                  <div id="modal{{$tpadquisicion->id}}" class="modal">
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
            @endforeach

        </tbody>
      </table>
      </div>
    </div>
  </div>
  <form action="{{route('TipoAdquisicion.store')}}" method="POST" id="formValidate">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="POST">
        <div id="modalcreate" class="modal">
          <div class="modal-content">
            <div class="row">
              <div class="center">
                <h5 class="light">Nuevo tipo de adquisicion</h5>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 center">
                <i class="material-icons prefix">perm_identity</i>
                <input id="icon_prefix" type="text"  name="uname"  class="required">
                <label for="icon_prefix">Nombre</label>
              </div>
              <div class="input-field col s12 center">
              <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Registrar</button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          </div>
        </div>
  </form>
</div>

  <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')
@endsection