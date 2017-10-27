@extends('templates.home')

@section('content')
<div class="container">
  
  <div class="row">
    <div class="left"><br>
      <h5 class="light text-light-blue text-darken-4">Tarifas</h5>
    </div>
    <div class="right"><br>
      <a href="{{route('tarifas.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>
  
  <div class="row">
    <div class="col s12">
      <div class="card hoverable">
        <table class="bordered centered responsive-table">
          <thead class="light-blue darken-1 white-text">
            <tr>
              <th>Codigo</th>
              <th>Estado</th>
              <th>Monto</th>
              <th>Inicio</th>
              <th>Final</th>
              <th>Rango</th>
              <th>Visitante</th>
              <th></th>
            </tr>
          </thead>
          
          <tbody>
            @foreach ($result as $r)
              <tr>
                <td>{{$r->id}}</td>
                <td>@if($r->activo ==1)
                    Activo
                  @else
                    Inactivo
                  @endif
                </td>
                <td>Q.{{$r->monto}}</td>
                <td>{{$r->inicio}}</td>
                <td>{{$r->final}}</td>
                <td>{{$r->rangoa}}</td>
                <td>{{$r->visitante}}</td>
                <td>
                
                <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom"  href="{{route('tarifas.edit',$r->id)}}" data-delay="50" data-tooltip="Editar tipo"><i class="material-icons">edit</i></a>
                <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="#modal1" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>
              
                </td>
              <form action="{{route('tarifas.destroy',$r->id)}}" method="POST">
                {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                    <div id="modal1" class="modal">
                      <div class="modal-content">
                        <h4 class="center-align">Desea eliminar la tarifa ?</h4>
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
@endsection

@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Tarifa:</strong><br>
     Tabla de precios, derechos o tasas de un servicio.</p>
  </div>
@endsection