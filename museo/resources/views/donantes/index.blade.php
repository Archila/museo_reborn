@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="left"><br>
      <h5 class="light">Listado de Donantes</h5>
    </div>

    <div class="right"><br>
      <a href="#" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card hoverable z-depth-2">
        <table class="centered highlight responsive-table">
          <thead class="light-blue darken-1 white-text">
            <tr>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Email</th>
              <th></th>

            </tr>
          </thead>

          <tbody>
            @foreach($donantes as $donante)
              <tr>
                <td>{{$donante->nombre}}</td>
                <td>{{$donante->telefono}}</td>
                <td>{{$donante->email}}</td>

                <td>
                  <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{route('Donante.edit',$donante->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>


                </td>
            
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
