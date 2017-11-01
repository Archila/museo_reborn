@extends('templates.home')
@section('content')

<div class="container">

  <div class="row">
    <div class="center"><br>

      <h5 class="light">Editar Donante</h5>

    </div>
  </div>

  <div class="card z-depth-4">

		<div class="card-image">
	    <a href="{{route('Donante.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>

    <div class="container">
      <div class="row">

    <form id="formValidate" method="POST" class="col s12" action="{{route('Donante.update',$donante->id)}}"><br>
     {{ csrf_field() }}
     {{ method_field('PUT') }}
    <div class="row">
      <div class="input-field col s6">
        <i class="material-icons prefix">perm_identity</i>
        <input value="{{$donante->nombre}}" id="icon_prefix" type="text"  name="uname" >
        <label for="icon_prefix">Nombre</label>
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">perm_identity</i>
        <input value="{{$donante->apellido}}" id="icon_prefix" type="text"  name="apellido" >
        <label for="icon_prefix">Apellido</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <i class="material-icons prefix">phone</i>
        <input value="{{$donante->telefono}}" id="icon_telephone" type="text" name="phone" >
        <label for="icon_telephone">Telefono</label>
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">email</i>
        <input value="{{$donante->email}}" id="email" type="email"  name="email" >
        <label for="email" data-error="wrong" >Email</label>
      </div>

      <p class="center-align">
        <button class="waves-effect waves-light btn"  type="submit"><i class="material-icons right">send</i>enviar</button>
     </p>
    </div>
    </form>
  </div>
  </div>
</div>

</div>
@endsection
