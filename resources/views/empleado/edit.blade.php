@extends('layout.home')
@section('content')
    <div class="row scrollspy ">
        <div class="col s12 m12 l12">
        <div class="card-panel">
        <h3 class="center-align">Actualizar Empleado</h3>
        <div class="row">
          <form method="POST" action="{{route('Empleado.update',$empleado->id)}}">
           {{ csrf_field() }}
            {{ method_field('PUT') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input placeholder="{{$empleado->nombre}}"  id="icon_prefix" type="text"  name="uname" value="{{$empleado->nombre}}" >
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input placeholder="{{$empleado->telefono}}"  id="icon_telephone" type="text" name="phone" value="{{$empleado->telefono}}">
              <label for="icon_telephone">Telefono</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input placeholder="{{$empleado->email}}"  id="email" type="email"  name="email" value="{{$empleado->email}}">
              <label for="email" data-error="wrong" >Email</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input placeholder="{{$empleado->dpi}}"  id="icon_prefix" type="text" name="dpi" value="{{$empleado->dpi}}">
              <label for="icon_prefix">DPI</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input id="icon_prefix" type="text"  name="usuario" value="{{$usuario->name}}">
              <label for="icon_prefix">Usuario</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">keyboard</i>
              <input id="password" type="password"  name="password" >
              <label for="password">Password</label>
            </div>
              <input  type="hidden"  name="idusuario" value="{{$usuario->id}}" >
            <div class="input-field col s6"  >
              <i class="material-icons prefix">person_add</i>
              <select name="rol" id="rol">
                <option value="" disabled selected>Rol</option>
                @foreach ($roles as $rol)
                  <option value="{{$rol->id}}">{{ $rol->nombre}}</option>
                @endforeach
              </select>
                <label>Seleccion de Rol</label>
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
@endsection
