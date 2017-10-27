@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="center"><br>
      <h5 class="light">Nueva pieza</h5>
    </div>
  </div>

  <div class="row">
      <div class="progress z-depth-3" id="progress1">
          <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
          </div>
          <span class="progress-type">Progreso</span>
          <span class="progress-completed">0%</span>
      </div>
  </div>

<div class="row card z-depth-3"> <!-- CONTENEDOR DE TABS -->
    <div class="col s12">
      <ul class="tabs"> <!-- TABS -->
        <li class="tab col s3"><a class="active" href="#test1" onclick="javascript: resetActive(event, 25, 'step-2');">Pieza</a></li>
        <li class="tab col s3"><a href="#test2" onclick="javascript: resetActive(event, 50, 'step-2');"><i class="material-icons prefix">import_contacts</i> Ficha informativa</a></li>
        <li class="tab col s3"><a href="#test3" onclick="javascript: resetActive(event, 75, 'step-2');"><i class="material-icons prefix">border_outer</i>Ficha técnica</a></li>
        <li class="tab col s3"><a href="#test5" onclick="javascript: resetActive(event, 100, 'step-2');"><i class="material-icons prefix">person</i>Adquisicion</a></li>
      </ul>
    </div>
  <form method="POST" action="{{route('Pieza.store')}}" enctype="multipart/form-data" class="col s12" name="datos" id="formValidate">   <!-- FORMULARIO -->
  {!! csrf_field() !!}
    <div id="test1" class="col s12"> <!-- PIEZA -->
      <br><br>
      <div class="col-md-12 well text-center">
          <div class="input-field col s3">
             <i class="material-icons prefix">vpn_key</i>
            <input disabled  name="codigopiez" id="disabled" value="SBX{{$newcod}}" type="text">
            <input type="hidden" name="codigopieza" value="SBX{{$newcod}}">
            <label for="disabled">Codigo de pieza</label>
          </div>
          <div class="input-field col s4">
              <i class="material-icons prefix">mode_edit</i>
              <input name="nombrepieza" type="text" class="required">
                  @if ($errors->has('nombrepieza'))
                  <div id="uname-error" class="error">{{$errors->First('nombrepieza')}}</div>
                  @endif
              <label for="nombrepieza">Nombre de la pieza</label>
          </div>
          <div class="input-field col s4">
            <i class="material-icons prefix">extension</i>
            <select name="idtipo" id="" class="required_option">
              <option value="" disabled selected>Elige el tipo</option>
              @foreach ($tipo_p as $tp)
               <option value="{{$tp->id_tipo }}">{{ $tp->nombre}}</option>
              @endforeach
            </select>
            @if ($errors->has('idtipo'))
              <div id="uname-error" class="error">{{$errors->First('idtipo')}}</div>
            @endif
            <label>Tipo de pieza</label>
          </div>
          <div class="input-field col s1">
            <a class="tooltipped  btn-floating btn-small waves-effect waves-light blue modal-trigger" data-position="bottom" href="#modalcreate" data-delay="50" data-tooltip="Agregar tipo"><i class="material-icons">add</i></a>
          </div>
      </div>
      <div class="input-field col s8">
        <div class="file-field input-field">
            <div class="btn">
              <span>Foto<i class="material-icons right">photo</i></span>
              <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Eliga una fotografia de la pieza">
            </div>
          </div>
      </div>
    </div> <!-- /PIEZA -->

    <div id="test2" class="col s12 "><!-- FICHA INFORMATIVA -->
      <br><br>
      <div class="input-field col s3">
        <i class="material-icons prefix">date_range</i>
        <input id="" name="epoca" type="text" class="cnumber">
        @if ($errors->has('epoca'))
          <div id="uname-error" class="error">{{$errors->First('epoca')}}</div>
        @endif
        <label for="last_name">   Epoca de la pieza</label>
      </div>
      <!-- Radio Buttons Multimedia -->
      <div class="col s12 ">
      <p > <input name="radsmult" type="radio" id="m1" value="mf" onclick="selectmultimedia()">
      <label for="m1">Seleccionar fotografia</label>
      <input name="radsmult" type="radio" id="m2" value="mv" onclick="selectmultimedia()">
      <label for="m2">Ingresar URL de video</label></p>
      <!-- / Radio Buttons Multimedia -->

      <!-- BOTON PARA CARGAR IMAGEN DEL SISTEMA -->
      <div class="input-field col s8" id="btnmult" style='display:none;' >
        <div class="file-field input-field">
            <div class="btn">
              <span>multimedia<i class="material-icons right">movie</i></span>
              <input type="file" name="media">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Eliga contenido para el sistema interactivo">
            </div>
          </div>
      </div> <!-- / BOTON PARA CARGAR IMAGEN DEL SISTEMA -->

      <!-- INGRESAR URL DE VIDEO -->
      <div class="input-field col s8" id="txturl" style='display:none;'>
          <i class="material-icons prefix">theaters</i>
          <input name="urlvideo" type="text" >
          <label for="urlvideo">URL del video de Youtube</label>
      </div> <!-- / INGRESAR URL DE VIDEO -->
    </div>
        <div class="input-field col s12" >
           <i class="material-icons prefix">import_contacts</i>
            <textarea name="historia" class="materialize-textarea" length="120"></textarea>
            <label for="message">Historia</label>
          <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
        </div>
    </div><!-- /FICHA INFORMATIVA -->

    <div id="test3" class="col s12"> <!-- FICHA TECNICA -->
      <br><br>
      <div class="input-field col s2">
        <input id="" name="peso" type="text" class="cnumber">
        @if ($errors->has('peso'))
        <div id="uname-error" class="error">{{$errors->First('peso')}}</div>
        @endif
        <label for="pesopieza">Peso (lbs)</label>
      </div>
      <div class="input-field col s2">
        <input id="" name="altura" type="text" class="cnumber">
        @if ($errors->has('altura'))
        <div id="uname-error" class="error">{{$errors->First('altura')}}</div>
        @endif
        <label for="alturapieza">Altura (mts)</label>
      </div>
      <div class="input-field col s2">
        <input id="" name="ancho" type="text" class="cnumber">
        @if ($errors->has('ancho'))
        <div id="uname-error" class="error">{{$errors->First('ancho')}}</div>
        @endif
        <label for="ancho">Ancho (mts)</label>
      </div>
      <div class="input-field col s4 offset-s1">
        <select name="idgenero">
          <option value="" disabled selected>Elige un género</option>
          @foreach ($genero as $gen)
            <option value="{{ $gen->id}}">{{ $gen->genero }}</option>
          @endforeach
        </select>
        @if ($errors->has('idgenero'))
        <div id="uname-error" class="error">{{$errors->First('idgenero')}}</div>
        @endif
        <label>Género</label>
      </div>
      <div class="input-field col s1">
        <a class="tooltipped  btn-floating btn-small waves-effect waves-light blue modal-trigger" data-position="bottom" href="#modalgenero" data-delay="50" data-tooltip="Agregar genero"><i class="material-icons">add</i></a>
      </div>
    </div><!-- FICHA TECNICA -->

    <div id="test5" class="col s12 "><!-- ADQUISICION -->
     <div class="input-field col s12">
       <select  onchange="selecionado()" name="tipoadquisicion" id="tipoadquisicion">
         <option value="" disabled selected>Tipo de Asquisicion</option>
          @foreach ($tipoadquisiciones as $tipoadquisicione)
          <option value="{{$tipoadquisicione->id}}">{{ $tipoadquisicione->nombre}}</option>
          @endforeach
        </select>
        @if ($errors->has('tipoadquisicion'))
        <div id="uname-error" class="error">{{$errors->First('tipoadquisicion')}}</div>
        @endif
        <label>Seleccion Tipo de aquisicion</label>
      </div>
        <!-- Radio button Nuevo donante SI/NO  -->
        <p id="p" style="display:none;" >Nuevo Donante?
          <input name="grp1" type="radio" id="r1" value="si" onclick="capturar()">
          <label for="r1">Si</label>
          <input name="grp1" type="radio" id="r2" value="no" onclick="capturar()">
          <label for="r2">No</label>
        </p>
        <!-- / Radio button Nuevo donante SI/NO  -->

        <!-- Buscar Donante -->
      <div id="SMO" style='display:none;' class="container">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <div>
                  <h5 class="center-align">Buscar donante</h5>
                </div>
                <div  class="center-align">
                  <div class="input-field col s7">
                    <i class="material-icons prefix">perm_identity</i>
                    <input name="buscar" id="buscar" id="icon_prefix" type="text"   >
                    <label for="icon_prefix">Nombre</label>
                  </div>
                </div>
                <br><br><br><br>
                <!-- Tabla deresultados -->
                  <table class="table table-bordered table-hover">
                    <thead> <!-- Encabezado de la tabla -->
                      <tr>
                        <th>ID</th><th>Nombre</th>
                        <th>Apellido</th><th>Telefono</th><th>Email</th>
                      </tr>
                    </thead>
                    <tbody>  <!-- Resultados de la busqueda con AJAX -->
                    </tbody> <!-- /Resultados de la busqueda con AJAX -->
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div> <!-- / Buscar Donante -->
      <!-- Nuevo Donante -->
      <div class="input-field col s12" id="cpNin" style='display:none;' >
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="icon_prefix" type="text"  name="uname" >
            <label for="icon_prefix">Nombre</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="icon_prefix" type="text"  name="apellido" class="required" >
            <label for="icon_prefix">Apellido</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">phone</i>
            <input id="icon_telephone" type="text" name="phone" class="phone" >
            <label for="icon_telephone">Telefono</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email"  name="email" class="email" >
            <label for="email" data-error="wrong" >Email</label>
          </div>
        </div>
      </div> <!-- / Nuevo Donante -->
      <input type="hidden" id="iddonanteC" name="iddonanteC"> <!-- id del donante seleccionado -->
      <p class="center-align">
        <button class="waves-effect waves-light btn"  type="submit"><i class="material-icons right">send</i>enviar</button>
      </p><br>
  </div> <!-- /ADQUISICION -->
  </form>  <!-- / FORMULARIO -->
  </div> <!-- /TABS -->
</div> <!-- Container -->
  <!-- FORMULARIO MODAL PARA AGREGAR TIPO DE PIEZA -->
  <form action="{{route('TipoPieza.store')}}" method="POST">
    {!! csrf_field() !!}
        <div id="modalcreate" class="modal">
          <div class="modal-content">
            <div class="row">
              <div class="center">
                <h5 class="light">Nuevo tipo de piezas</h5>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s5 offset-s3">
                <i class="material-icons prefix">mode_edit</i>
                <input id="" name="nombretipo" type="text" value="">
                <label for="uname">Nombre del tipo</label>
              </div>
              <div class="input-field col s12 center">
                <button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
                  <i class="material-icons right">send</i>Agregar
                </button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <p class="left light">Nota: los datos ingresados en el formulario de nueva pieza se perderan</p>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          </div>
        </div>
  </form>

 <!-- FORMULARIO MODAL PARA AGREGAR UN GENERO -->
  <form action="{{route('Genero.store')}}" method="POST">
    {!! csrf_field() !!}
        <div id="modalgenero" class="modal">
          <div class="modal-content">
            <div class="row">
              <div class="center">
                <h5 class="light">Nuevo genero de piezas</h5>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s5 offset-s3">
                <i class="material-icons prefix">mode_edit</i>
                <input id="" name="nombregenero" type="text" value="">
                <label for="uname">Nombre del genero</label>
              </div>
              <div class="input-field col s12 center">
                <button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
                  <i class="material-icons right">send</i>Agregar
                </button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
          </div>
        </div>
  </form>

  <script type="text/javascript">
  //Funcion para cambiar la barra de progreso
  function resetActive(event, percent, step) {
      $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
      $(".progress-completed").text(percent + "%");
  }
  //Funcion para cambiar la barra de progreso
  function selectmultimedia(){
    var resultado="ninguno";
    var rads=document.getElementsByName("radsmult");
    for(var i=0;i<rads.length;i++){
        if(rads[i].checked)
        resultado=rads[i].value;    }
    if (resultado=="mf") {
      document.getElementById('btnmult').style.display = 'block';
      document.getElementById('txturl').style.display = 'none';
   }else if (resultado=="mv") {
     document.getElementById('txturl').style.display = 'block';
     document.getElementById('btnmult').style.display = 'none';

   }
  }


  function selecionado(){
    var select = document.getElementById('tipoadquisicion');
    var id=select.value;
    var tipo= select.options[select.selectedIndex].text;
    if (tipo=="Heredado"){
      ocultar();}
    else {mostrar();}
  }

 function mostrar(){
  document.getElementById('p').style.display = 'block';
 }
 function ocultar(){
      document.getElementById('p').style.display = 'none';
      document.getElementById('SMO').style.display = 'none';
      document.getElementById('cpNin').style.display = 'none';
 }


function capturar()
{
   var resultado="ninguno";
   var radios=document.getElementsByName("grp1");
   for(var i=0;i<radios.length;i++)
   {
       if(radios[i].checked)
       resultado=radios[i].value;
   }
   if (resultado=="si") {

    document.getElementById('SMO').style.display = 'none';
    document.getElementById('cpNin').style.display = 'block';

  }else {

    document.getElementById('SMO').style.display = 'block';
      document.getElementById('cpNin').style.display = 'none';
      buscarDon();
  }
}


function capturarDonante()
{
   var resultado="ninguno";
   var radios=document.getElementsByName("grp2");
   for(var i=0;i<radios.length;i++)
   {
       if(radios[i].checked)
       resultado=radios[i].value;
   }

  document.datos.iddonanteC.value = resultado;
}


function buscarDon()
{
  $('#buscar').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type : 'get',
       url : '{{URL::to('buscardon')}}',
       data : {'search':$value},
       success:function(data){
         $('tbody').html(data);
       }
    });
  })
}
</script>
  <!-- <script type="text/javascript" src="{{URL::asset('js/adquisicion.js')}}"></script> -->
  <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>

    @include('sweet::alert')
@endsection
