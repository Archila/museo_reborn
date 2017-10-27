@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="center"><br>
        
      <h5 class="light">Editar Usuario</h5>
      
    </div>
  </div>

  <div class="card z-depth-4">
	  
		<div class="card-image">
	    <a href="{{route('Empleado.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
    
    <div class="container">  
      <div class="row">
        <form  id="formValidate" method="POST" class="col s12" action="{{route('Empleado.update',$empleado->id)}}"><br>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">
            
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input class="required" placeholder="{{$empleado->nombre}}"  id="icon_prefix" type="text"  name="uname" value="{{$empleado->nombre}}" >
              <label for="icon_prefix">Nombre</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input class="required" placeholder="{{$empleado->telefono}}"  id="icon_telephone" type="text" name="phone" value="{{$empleado->telefono}}">
              <label for="icon_telephone">Telefono</label>
            </div>
            
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input class="required" placeholder="{{$empleado->email}}"  id="email" type="email"  name="email" value="{{$empleado->email}}">
              <label for="email" data-error="wrong" >Email</label>
            </div>
            
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input class="required" placeholder="{{$empleado->dpi}}"  id="icon_prefix" type="text" name="dpi" value="{{$empleado->dpi}}">
              <label for="icon_prefix">DPI</label>
            </div>
            
            <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input class="required" id="icon_prefix" type="text"  name="usuario" value="{{$usuario->name}}">
              <label for="icon_prefix">Usuario</label>
            </div>
            
            <div class="input-field col s6">
              <i class="material-icons prefix">keyboard</i>
              <input class="required" id="password" type="password"  name="password" >
              <label for="password">Password</label>
            </div>
              <input  type="hidden"  name="idusuario" value="{{$usuario->id}}" >
            <div class="input-field col s6"  >
              <i class="material-icons prefix">person_add</i>
                <select class="required_option" name="rol" id="rol">
                  <option value="" disabled selected>Rol</option>
                    @foreach ($roles as $rol)
                    @if ( ($usuario->rol) == ($rol->id))
                                <option value="{{$rol->id}}" selected>{{$rol->nombre}}</option>
                                @else
                      <option value="{{$rol->id}}">{{ $rol->nombre}}</option>
                      @endif
                    @endforeach
                </select>
              <label>Seleccion de Rol</label>
            </div>
            <div class="input-field col s6">
              <p class="center-align">
              <button class="btn waves-effect waves-effect waves-light  light-blue darken-4" type="submit" name="action">Registrar</button>
              </p>
            </div>
          </div>  
        </form>
        </div>
        </div>
    </div>  

</div>


@endsection
