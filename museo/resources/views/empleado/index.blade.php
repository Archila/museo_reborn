@extends('templates.home')

@section('content')


<div class="container">
  
  <div class="row">
    <div class="left"><br>
      <h5 class="light">Listado de Empleados</h5>
    </div>
    
    <div class="right"><br>
      <a href="{{route('Empleado.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>
  
  <div class="row">
    <div class="col s12">
      <div class="card hoverable z-depth-2">
        <table class="centered highlight responsive-table">
          <thead class="light-blue darken-1 white-text">
            <tr>
              <th>Nombre</th>
              <th>DPI</th>
              <th>Rol</th>
              <th>Email</th>
              <th>Usuario</th>
              <th>Telefono</th>
              <th></th>
            </tr>
          </thead>
          
          <tbody>
            @foreach($empleados as $empleado)
              <tr>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->dpi}}</td>
                <td>{{$empleado->rol}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->name}}</td>
                <td>{{$empleado->telefono}}</td>
               
                <td>
                  <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{route('Empleado.edit',$empleado->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                  <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="#modal{{$empleado->id}}" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>
                 

                </td>
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
@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Empleado:</strong><br> 
    Persona que desempeña algún cargo o servicio dentro de la institucion.</p>
  </div>
@endsection