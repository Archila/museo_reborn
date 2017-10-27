@extends('templates.home')

  @section('content')

  <div class="row">
    <div class="center"><br>
      <h5 class="light">Edicion de pieza</h5>
    </div>
  </div>
    <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card z-depth-4"> <!-- Borde -->
                    <div class="row">
                      <!-- FORMULARIO DE PIEZAS -->
                      <form method="POST" id="formValidate" action="{{route('Pieza.update',$p->id)}}" enctype="multipart/form-data"
                        class="col s12" id="formValidate">
                            <input name="_method" type="hidden" value="PUT">
                        {!! csrf_field() !!}
                        <div class="row"> <!-- Tofo el formulario -->

                          <div class="row">
                          <p Heading h6>Estado de la pieza  <p>
                          <div class="switch modal-trigger"> <!-- ACTIVA / INACTIVA -->
                            <label>
                              Inactiva
                              @if (($p->activo) == 1)
                                <input type="checkbox" name="si" checked>
                                @else
                                <input type="checkbox" name="si">
                              @endif
                              <span class="lever"></span>
                              Activa
                            </label>
                          </div>
                          <br>
                          <div class="divider"></div>
                          <div class="input-field col s3">
                             <i class="material-icons prefix">vpn_key</i>
                            <input disabled name="codigopieza" id="codigopieza" value="{{$p->cod_pieza }}" type="text">
                            <label for="disabled">Codigo de pieza</label>
                          </div>
                          <div class="input-field col s5">
                              <i class="material-icons prefix">mode_edit</i>
                              <input id="nombrepieza" name="nombrepieza" type="text" value="{{$p->nombre }}" class="required">
                              <label for="uname">Nombre de la pieza</label>
                          </div>
                          <div class="input-field col s4">
                            <i class="material-icons prefix">extension</i>
                            <select name="idtipo" id="idtipo" class="required_option">
                              @foreach ($tpieza as $tp)
                              @if ( ($p->id_tipopieza) == ($tp->id_tipo))
                              <option value="{{$tp->id_tipo }}" selected>{{ $tp->nombre}}</option>
                              @else
                              <option value="{{$tp->id_tipo }}">{{ $tp->nombre}}</option>
                              @endif
                            @endforeach
                            </select>
                            <label>Tipo de pieza </label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col s3">
                          Fotografia actual
                            <img class="materialboxed card z-depth-1" width="180" src="{{URL::asset($p->fotografia)}}">
                        </div>
                          <div class="input-field  col s9">
                            <div class="file-field input-field">
                                <div class="btn">
                                  <span>Foto</span>
                                  <input type="file" name="foto">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Eliga una nueva fotografia si desea cambiarla">
                                </div>
                              </div>
                          </div>
                        </div>

                        <div class="divider"></div>
                        <p class="light center">Ficha Informativa </p>
                        @foreach ($fi as $i)
                        <div class="input-field col s3">
                          <i class="material-icons prefix">date_range</i>
                          <input id="" value="{{ $i->epoca }}" name="epoca" type="text" class="cnumber">
                          <label for="last_name">   Epoca de la pieza</label>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                           <i class="material-icons prefix">import_contacts</i>
                            <textarea name="historia"  class="materialize-textarea">{{$i->historia}}</textarea>
                            <label for="message">Historia</label>
                          <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                        </div>
                        @endforeach
                        <div class="divider"></div>
                          <p class="light center">Ficha Tecnica </p>
                        @foreach ($ft as $t)
                        <div class="input-field col s2">
                          <input value="{{$t->peso}}" name="peso"  type="text" class="cnumber" >
                          <label for="peso">Peso (lbs)</label>
                        </div>
                        <div class="input-field col s3">
                          <input value="{{$t->altura}}" name="altura" type="text" class="cnumber">
                          <label for="alturapieza">Altura (mts)</label>
                        </div>
                        <div class="input-field col s2">
                          <input value="{{$t->ancho}}" name="ancho" type="text" class="cnumber"><p></p>
                          <label for="ancho">Ancho (mts)</label>
                        </div>
                        <div class="input-field col s3">
                          <select name="idgenero" class="required_option">
                            @foreach ($genero as $gen)
                            @if (($t->genero)== $gen->id)
                            <option value="{{ $gen->id}}" selected>{{ $gen->genero }}</option>
                            @else
                            <option value="{{ $gen->id}}">{{ $gen->genero }}</option>
                            @endif
                            @endforeach
                          </select>
                          <label>Género</label>
                        </div>
                        @endforeach
                  </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="hidden" name="nfoto" value="{{$p->fotografia}}">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                            <i class="material-icons right">update</i>Actualizar
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection