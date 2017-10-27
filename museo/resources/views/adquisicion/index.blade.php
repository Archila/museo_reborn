@extends('templates.home')

@section('content')

  <div class="container">
    <div class="row">
      <div class="left"><br>
        <h5 class="light text-light-blue text-darken-4">Adquisiciones</h5>
      </div>
      <div class="right"><br>
        <a href="{{route('Pieza.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
      </div>
    </div>
   <div class="col s12 m12 l12">
   <div class="card">

      <table class="highlight bordered centered responsive-table">
        <thead class=" light-blue darken-4 white-text ">
          <tr>
              <th>Fecha</th>
              <th>Pieza</th>
              <th>Donante</th>
              <th>Empleado</th>
              <th>Tipo</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($adquisiciones as $adquisiciond)
            <tr>
            <td>{{$adquisiciond->fecha}}</td>
            <td>{{$adquisiciond->pieza}}</td>
            <td>{{$adquisiciond->donante}}</td>
            <td>{{$adquisiciond->empleado}}</td>
            <td>{{$adquisiciond->adquisiciones}}</td>
            </tr>
            @endforeach

        </tbody>
      </table>


  </div>
  </div>
  </div>



<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')

@endsection