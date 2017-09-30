@extends('layout.home')

@section('content')


  <div class="container">
    <div class="row">
      <div class="left"><br>
        <h5 class="light  text-darken-4">Listado de Empleados</h5>
      </div>
      <div class="right"><br>
        <a href="{{route('Empleado.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
      </div>
    </div>
   <div class="col s12 m12 l12">
   <div class="card">
      <table class="highlight bordered centered responsive-table">
        <thead class=" light-blue darken-4 white-text ">
          <tr>
              <th>Nombre</th>
              <th>Activo</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>DPI</th>
              <th>Usuario</th>
              <th>Rol</th>
              <th>Opciones</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($empleados as $empleado)
            <tr>

            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->activo}}</td>
            <td>{{$empleado->telefono}}</td>
            <td>{{$empleado->email}}</td>
            <td>{{$empleado->dpi}}</td>
            <td>{{$empleado->name}}</td>
            <td>{{$empleado->rol}}</td>
            <td>
              <a class="modal-trigger" href="#modal{{$empleado->id}}"><span class="new badge red"  data-badge-caption="Eliminar"></span></a>
               <a href="{{route('Empleado.edit',$empleado->id)}}" ><span class="new badge blue" data-badge-caption="Editar"></span></a>
            </td>
            </tr>

            <form action="{{route('Empleado.destroy',$empleado->id)}}" method="POST">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                    <div id="modal{{$empleado->id}}" class="modal">
                      <div class="modal-content">
                        <h4 class="center-align">Desea eliminar?</h4>
                        <center> <i class="center-align medium material-icons">error_outline</i></center>
                        <p class="center-align">Nota: los cambios no pueden deshacerse </p>
                      </div>
                      <div class="modal-footer">
                        <input  type="hidden"  name="idusuario" value="{{$empleado->iduser}}" >
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

  <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
