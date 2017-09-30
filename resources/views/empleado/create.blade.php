@extends('layout.home')
@section('content')
    <div class="container ">
      <div class="row">
        <div class="center"><br>
          <h5 class="light">Nueva pieza</h5>
        </div>
      </div>
        <div class="col s12 m12 l12">
        <div class="card-panel z-depth-3">
        <div class="row">

          <form method="POST" action="{{route('Empleado.store')}}" id="formValidate">
           {{ csrf_field() }}
            {{ method_field('POST') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">person</i>
              <input id="icon_prefix" type="text"  name="" autofocus class="required" >
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input id="icon_telephone" type="text" name="phone"  class="cnumber">
              <label for="icon_telephone">Telefono</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="email" type="email"  name="email" class="email">
              <label for="email" data-error="wrong" >Email</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">note</i>
              <input id="icon_prefix" type="text" name="dpi"  class="required">
              <label for="icon_prefix">DPI</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input id="icon_prefix" type="text"  name="usuario" class="required">
              <label for="icon_prefix">Usuario</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">keyboard</i>
              <input id="password" type="password"  name="password" class="required" >
              <label for="password">Password</label>
            </div>
            <div class="input-field col s6"  >
              <i class="material-icons prefix">person_add</i>
              <select name="rol" id="rol"  class="required_option">
                <option value="" disabled selected>Rol</option>
                @foreach ($roles as $rol)
                  <option value="{{$rol->id}}">{{ $rol->nombre}}</option>
                @endforeach
              </select>
                <label>Seleccione un Rol</label>
            </div>
            <div class="input-field col s6"  >
             <a  href="#modal1" class="btn-floating btn-small waves-effect waves-light blue modal-trigger" ><i class="material-icons">add</i></a>
            </div>
            <div class="input-field col s12">
              <p class="center-align">
                <button class="waves-effect waves-light btn"  type="submit"><i class="material-icons right">send</i>enviar</button>
             </p>
            </div>
          </div>
        </form>
        </div>
        </div>
        </div>
        </div>

    <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')

        <div id="modal1" class="modal">
          <form method="POST" action="{{route('Rol.store')}}" >
           {{ csrf_field() }}
             {{ method_field('POST') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text"  name="nombre" >
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text"  name="desc" >
              <label for="icon_prefix">Descripcion</label>
            </div>

            <p class="center-align">
              <button class="waves-effect waves-light btn"  type="submit"><i class="material-icons right">send</i>enviar</button>
           </p>
          </div>
        </form>
        </div>

@endsection
