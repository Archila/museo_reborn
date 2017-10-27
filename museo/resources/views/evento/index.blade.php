@extends('templates.home')
  @section('content')

    <div class="container">

      <div class="row">
        <div class="left"><br>
          <h5 class="light">Eventos</h5>
        </div>

        <div class="right"><br>
          <a href="{{route('Evento.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
        </div>
    </div>

    <div class="row">
      <div class="col s12">
        <div class="card hoverable z-depth-2">
          <table class="centered highlight responsive-table">
            <thead class="light-blue darken-1 white-text">
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Activo</th>
                <th></th>
              </tr>
            </thead>
          <tbody>
          @foreach ($eventos as $evento)
            <tr>
            <td>{{$evento->nombre}}</td>
            <td>{{$evento->descripcion}}</td>
            <td>{{$evento->fecha_inicial}}</td>
            <td>{{$evento->fecha_final}}</td>
            <td>
              @if ($evento->activo == 1)
              <div class="switch">
                 <label>
                   Off
                   <input disabled type="checkbox" checked>
                   <span class="lever"></span>
                   On
                 </label>
               </div>

              @else
              <div class="switch">
                 <label>
                   Off
                   <input disabled type="checkbox">
                   <span class="lever"></span>
                   On
                 </label>
               </div>
              @endif

            </td>
            <td>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom"  href="{{route('Evento.edit',$evento->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="#modal{{$evento->id}}" data-delay="50" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
           </td>
            </tr>
            <form action="{{route('Evento.destroy',$evento->id)}}" method="POST">
              {{csrf_field()}}
              {{ method_field('DELETE') }}
                  <div id="modal{{$evento->id}}" class="modal">
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
    
</div>

  

<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')
  <script type="text/javascript">

  function activo(){
  var select = document.getElementById('tipoadquisicion');
  var id=select.value;
  var tipo= select.options[select.selectedIndex].text;
  if (tipo=="Heredado")
  {ocultar();}
  else {mostrar();}
  }
  </script>
@endsection
@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Eventos:</strong><br>
    Acontecimientos, especialmente si son de cierta importancia.</p>
  </div>
@endsection