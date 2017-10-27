@extends('templates.home')
@section('content')

<div class="container ">

  <div class="row">
    <div class="center">
      <h5 class="light">Nuevo Empleado</h5>
    </div>
  </div>
  
  <div class="card z-depth-4">
    <div class="card-image">
	    <a href="{{route('Empleado.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
      <div class="container">  
        <div class="row">
        <br>
          <form class="col s12" method="POST" action="{{route('Empleado.store')}}" id="formValidate">
            {{ csrf_field() }}
            {{ method_field('POST') }}
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">person</i>
                  <input id="icon_prefix" type="text" name="uname" class="required" >
                  <label for="icon_prefix">Nombre</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">phone</i>
                  <input id="icon_telephone" type="text" name="phone"  class="required">
                  <label for="icon_telephone">Telefono</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">email</i>
                  <input id="email" type="email"  name="email" class="required">
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
                <div class="input-field col s5"  >
                  <i class="material-icons prefix">person_add</i>
                  <select name="rol" id="rol"  class="required_option">
                    <option value="" disabled selected>Rol</option>
                      @foreach ($roles as $rol)
                        <option value="{{$rol->id}}">{{ $rol->nombre}}</option>
                      @endforeach
                  </select>
                  <label>Seleccione un Rol</label>
                </div>
                <div class="input-field col s2"  >
                  <a href="#modal1" class="btn-floating btn-smallwaves-effect waves-light  light-blue darken-4 modal-trigger" ><i class="material-icons">add</i></a>
                </div>
                <div class="input-field col s5">
                  <p class="center-align">
                  <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Crear</button>
                  </p>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    

    <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4 class="center-align">Nuevo Rol</h4>
    
        <form class="col s12" method="POST" action="{{route('Rol.store')}}" id="formValidate">
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
            <div class="input-field col s12 center-align">
              <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Agregar</button>
            </div>
          </div>
        </form>
      </div>
    </div>    
@endsection