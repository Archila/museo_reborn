@extends('templates.home')
@section('title', 'donante')
@section('content')


    <div class="row scrollspy ">
        <div class="col s12 m12 l12">
        <div class="card-panel">
        <h3 class="center-align">Ingrese Nuevo Donante</h3>
        <div class="row">

          <form method="POST" action="{{route('Donante.store')}}">
           {{ csrf_field() }}
           {{ method_field('POST') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text"  name="nombre"  autofocus>
              @if ($errors->has('nombre'))
              <span class="content" style="color:red;">{{$errors->first('nombre')}}</span>
              @endif
              <label for="icon_prefix">Nombre</label>

            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text"  name="apellido" >
              <label for="icon_prefix">Apellido</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input id="icon_telephone" type="text" name="phone" >
              <label for="icon_telephone">Telefono</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="email" type="email"  name="email" >
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

      <script type="text/javascript">
            $(document).ready(function() {
        setTimeout(function() {
            $(".content").fadeOut(1500);
        },3000);
      });
      </script>

@endsection
