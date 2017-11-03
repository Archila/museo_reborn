@extends('pagina.master')
@section('title', 'Museo Historia')
@section('contenido')

        <!--========== SWIPER SLIDER ==========-->
        <div class="s-swiper">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('pagina/img/1920x1080/014.png');">
                    <div class="container g-text-center--xs g-ver-center--xs">
                        <div class="g-margin-b-30--xs">
                            <h1  class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white"> Museo de Historia <br>de Quetzaltenango</h1>
                        </div>
                        <img class="logo-img s-header" src="pagina/img/museo-lg.png" alt="SBX Logo"><br> <br>
                        <div class="col-xs-6   g-margin-b-0--sm">
                            <div class="g-text-center--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--white g-margin-b-30--xs ti-location-pin"></i>
                                <h4 class="g-font-size-22--xs g-color--white-opacity g-margin-b-5--xs"><strong>Ubicación</strong></h4>
                                <p class="g-font-size-18--xs g-color--white"> 4ta. Calle y 19 avenida de la zona 3, tercer nivel de Centro Intercultural</p>
                            </div>
                        </div>

                        <div class="col-xs-6  g-margin-b-0--sm">
                            <div class="g-text-center--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--white g-margin-b-30--xs ti-alarm-clock"></i>
                                <h4 class="g-font-size-22--xs g-color--white-opacity g-margin-b-5--xs"><strong>Horario</strong></h4>
                                <p class="g-font-size-18--xs g-color--white">De Lunes a Domingo de 9:00 am a 8:00 pm</p>
                            </div>
                        </div>



                    </div>

                </div>

            </div>
            <!-- End Swiper Wrapper -->
            <a href="#js__scroll-to-section" class="s-scroll-to-section-v1--bc g-margin-b-15--xs">
                <span class="g-font-size-18--xs  ti-angle-double-down" style="color: white;"></span>
                <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs"><b>Aprende más</b></p>
            </a>
        </div>
        <!--========== END SWIPER SLIDER ==========-->

        <!--========== PAGE CONTENT ==========-->
        <!-- Features -->
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-100--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Bienvendio a la página del Museo de Historia de Quezaltenango</p>

                <h2 class="g-font-size-16--xs g-font-size-26--md">presentando varias exhibiciones:  </h2>
            </div>
            <div class="row g-margin-b-60--xs g-margin-b-70--md">
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
                                <i class="g-font-size-28--xs g-color--primary ti-image"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Fotografias</h3>
                            <p class="g-margin-b-0--xs">Fotografias de los edificios sobresalientes de Quetzaltenango de la epoca de 1930.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".2s">
                                <i class="g-font-size-28--xs g-color--primary ti-map-alt"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Planos</h3>
                            <p class="g-margin-b-0--xs">Planos de la arquitectura del Centro Historico y la antigua Estación del Ferrocarril de los Altos</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".3s">
                                <i class="g-font-size-28--xs g-color--primary ti-tablet"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Guia interactivo</h3>
                            <p class="g-margin-b-0--xs">El museo cuenta con Tablets que contienen un sistema que le mostrara información detallada de cada pieza al escanear el código QR de cada una.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // end row  -->
            <div class="row">
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".4s">
                                <i class="g-font-size-28--xs g-color--primary ti-video-camera"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Video historico</h3>
                            <p class="g-margin-b-0--xs">Como introducción al tour, se proyecta un video que trata de la historia de Quetzaltenango. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".5s">
                                <i class="g-font-size-28--xs g-color--primary ti-pin2"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Piezas historicas</h3>
                            <p class="g-margin-b-0--xs">Piezas reales del antiguo Ferrocarril de los Altos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".6s">
                                <i class="g-font-size-28--xs g-color--primary ti-book"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Exposición de literatura Guatemalteca</h3>
                            <p class="g-margin-b-0--xs">Se cuenta con exposiciones temporales de libros de autores Guatemaltecos</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // end row  -->
        </div>
        <!-- End Features -->

        <!-- Frase-->
        <div class="js__parallax-window" style="background: url(pagina/img/1920x1080/parque.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">

                <h3 class="g-font-size-25--xs g-font-size-50--md g-color--white">El Museo de Historia de Quetzaltenango se dedica al estudio, preservación y difusión de la historia del occidente de Guatemala</h3>
            </div>
        </div>
        <!-- Frase -->

        <!-- Culture -->
        <div class="g-promo-section">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="row">
                    <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Historia</p>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <h2 class="g-font-size-20--xs g-font-size-25--sm g-font-size-50--md">Acerca del</h2>
                        </div>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h2 class="g-font-size-30--xs g-font-size-45--sm g-font-size-60--md">Ferrocarril de los Altos</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1" align="justify">
                        <p class="g-font-size-18--xs">La historia del Ferrocarril Eléctrico Nacional de Los Altos comenzó el 30 de marzo de 1930 y funcionó 3 años consecutivos hasta el 19 de septiembre de 1933, tres años en que los quezaltecos disfrutaron esa obra de la ingeniería alemana.  El recorrido era de 45 kilómetros, entre Quezaltenango y San Felipe Retalhuleu, en ese punto costero se uniría con la terminal del International Railways of Central America, que en 1912 absorbió el
                        Ferrocarril Guatemalteco.</p>
                        <p class="g-font-size-18--xs">La recaudación millonaria para la construcción del Ferrocarril se hizo gracias al Acuerdo Gubernativo 1119 impuesta al consumo de alcohol, en el que cada botella de licor consumida pagaba tres pesos que eran destinados a la mega obra...<a href="{{ url('/ferrocarril') }}"> Ver más</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 g-promo-section__img-right--lg g-bg-position--center g-height-100-percent--md js__fullwidth-img">
                <img class="img-responsive" src="{{URL::asset('pagina/img/970x970/ferrocarril.jpg')}}" alt="Image">
            </div>
        </div>
        <!-- End Culture -->
<hr>
        <!-- Portfolio Filter -->
        <div class="container g-padding-y-80--xs" id="piezas">
            <div class="g-text-center--xs g-margin-b-40--xs">
                <h2 class="g-font-size-32--xs g-font-size-36--md">Piezas</h2>
                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Listado de algunas piezas que puede encontrar en el Museo</h3>
            </div>
            <div class="s-portfolio">
                <div id="js__filters-portfolio-gallery" class="s-portfolio__filter-v1 cbp-l-filters-text cbp-l-filters-center">
                    <div data-filter="*" class="s-portfolio__filter-v1-item cbp-filter-item cbp-filter-item-active">Todas</div>
                    @foreach ($tipos as $tipo)
                    <div data-filter=".{{$tipo->nametipo}}" class="s-portfolio__filter-v1-item cbp-filter-item">{{$tipo->nametipo}}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Portfolio Filter -->

        <!-- Portfolio Gallery -->
        <div class="container g-margin-b-100--xs">
            <div id="js__grid-portfolio-gallery" class="cbp">

              @foreach ($piezas as $pieza)
                <!-- Pieza-->
                <div class="s-portfolio__item cbp-item {{$pieza->nombretipo}}">
                    <div class="s-portfolio__img-effect">
                        <img src="{{$pieza->foto}}" alt="Imagenes Museo" style="width:377px;height:251px;">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">{{$pieza->nombrepieza}}</h4>
                            <p class="g-color--white-opacity">{{$pieza->historia}}</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="{{$pieza->foto}}" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="{{$pieza->nombrepieza}} <br/> Museo de Historia de Quetzaltenango">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Pieza -->
                @endforeach
            </div>
            <!-- End Portfolio Gallery -->
        </div>
        <!-- End Portfolio -->

        <!-- Testimonials -->
        <div class="js__parallax-window" style="background: url(pagina/img/1920x1080/04.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-50--xs">Experiencias</p>
                <div class="s-swiper js__swiper-testimonials">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper g-margin-b-50--xs">
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>"Los museos son lugares donde el tiempo se transforma en espacio"</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Orhan Pamuk</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" Dado que el arte ha muerto en la vida real de las naciones civilizadas, se ha relegado a estos depósitos de cadáveres grotescos: los museos "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Walter Gropius</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" Frase "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Jake Richardson / Google</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Swipper Wrapper -->

                    <!-- Arrows -->
                    <div class="g-font-size-22--xs g-color--white-opacity js__swiper-fraction"></div>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
                    <!-- End Arrows -->
                </div>
            </div>
        </div>
        <!-- End Testimonials -->



        <!-- Eventos -->
        <div class="g-bg-color--sky-light" id="eventos">
            <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Proximos eventos</h2>
                    <a href="{{ url('/eventos') }}"> Ver todos <i class="g-font-size-18--xs  ti-layers-alt"></i></a>
                </div>

                <div class="row g-row-col--12">

                    @foreach ($eventos as $evento)
                    <!-- Evento -->
                    <div class="col-md-3 col-lg-4 g-margin-b-10--xs g-margin-b-0--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">
                                <h3 class="g-font-size-25--xs g-color--primary g-margin-b-30--xs">{{$evento->nombre}}</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i>{{$evento->descripcion}}</li>
                                </ul>
                                <div class="g-margin-b-40--xs">
                                  <i class="g-display-block--xs g-font-size-30--xs g-color--primary g-margin-b-30--xs ti-calendar"></i>
                                  <!-- Fecha inicial -->
                                  <span class="g-font-size-20--xs">Inicia: </span>
                                  <span class="s-plan-v1__price-tag"> {{ mostrarDia($evento->fecha_inicial)}}</span>
                                  <span class="s-plan-v1__price-mark">{{ mostrarMesAnio($evento->fecha_inicial)}}</span><br>
                                  <!-- /Fecha inicial -->
                                  <!-- Fecha final -->
                                    <span class="g-font-size-20--xs">Finaliza: </span>
                                  <span class="s-plan-v1__price-tag">{{ mostrarDia($evento->fecha_final)}}</span>
                                  <span class="s-plan-v1__price-mark">{{ mostrarMesAnio($evento->fecha_final)}}</span>
                                  <!-- /Fecha final-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Evento -->
                    @endforeach

                </div>
            </div>
        </div>
        <!-- /Eventos -->

        <!-- Conta -->
        <div class="js__parallax-window" style="background: url(pagina/img/1920x1080/vias.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="row">
                  @if ($tpiezas!=null)
                  @foreach ($tpiezas as $tpieza)
                    <div class="col-md-2 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--lg">
                        <div class="g-text-center--xs">
                            <figure class="g-display-block--xs g-font-size-70--xs g-color--white g-margin-b-10--xs js__counter">{{$tpieza->numero}}</figure>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">{{$tpieza->nametipo}}</h4>
                        </div>
                    </div>
                @endforeach
                @endif
                </div>
            </div>
        </div>
        <!-- End Counter -->

        <!-- Culture -->
        <div class="g-promo-section">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="row">
                    <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Historia</p>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <h2 class="g-font-size-20--xs g-font-size-30--sm g-font-size-40--md">Acerca de</h2>
                        </div>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h2 class="g-font-size-30--xs g-font-size-40--sm g-font-size-50--md">Presidentes del occidente de Guatemala</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1" align="justify">
                        <p class="g-font-size-18--xs">Historia</p>
                        <p class="g-font-size-18--xs">Conozcamos la historia Guatemala narrada desde la perspectiva de occidente. Iniciamos este recorrido narrado la historia de los presidentes de la región que transformaron al país...<a href="{{ url('/presidentes') }}"> Ver más</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 g-promo-section__img-right--lg g-bg-position--center g-height-100-percent--md js__fullwidth-img">
                <img class="img-responsive" src="pagina/img/970x970/presidentes.jpg" alt="Image">
            </div>
        </div>
        <!-- End Culture -->
        <!-- Patrocinadores -->
        <div class="g-bg-color--sky-light">

            <div class="g-container--md g-padding-y-80--xs g-padding-y-60--sm">
              <div class="g-container--sm">
                  <div class="g-text-center--xs g-margin-b-80--xs">
                      <h3 class="g-font-size-32--xs g-font-size-26--sm">Patrocinadores</h3>
                  </div>
              </div>

                <!-- Swiper Clients -->
                <div class="s-swiper js__swiper-clients">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                                <img class="s-clients-v1" src="pagina/img/clients/zeppelin.png" alt="El Zeppelin Logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".2s">
                                <img class="s-clients-v1" src="pagina/img/clients/club-rotario.png" alt="Clients Logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">
                                <img class="s-clients-v1" src="pagina/img/clients/xelapan.PNG" alt="Clients Logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".4s">
                                <img class="s-clients-v1" src="pagina/img/clients/paseo-americas.png" alt="Clients Logo">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                <img class="s-clients-v1" src="pagina/img/clients/cosami.png" alt="Clients Logo">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Swiper Clients -->
            </div>
        </div>
        <!--  /Patrocinadores -->

        <!-- Google Map -->
        <section class="s-google-map">
            <!--<div id="js__google-container" class="s-google-container g-height-400--xs"></div>-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1928.3177781789573!2d-91.5254192419603!3d14.845698297411701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc120205980b23c0!2sMuseo+del+Ferrocarril+de+Los+Altos!5e0!3m2!1ses!2sus!4v1508253918706" width="100%" height="400"  frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>
        <!-- End Google Map -->
        <!--========== END PAGE CONTENT ==========-->


  <?php //Ejemplo funciones aprenderaprogramar.com
  //Declaración de funciones
  function mostrarDia($fecha) {
    $arrayFechai = explode("-", $fecha, 3);
    $diai=$arrayFechai[2];
    echo $diai;
  }

  function mostrarMesAnio($fecha) {
    $arrayFechai = explode("-", $fecha, 3);
    $anoi=$arrayFechai[0];
    $mesi=$arrayFechai[1];

    if ($mesi==1) {
      $mesli="Ene";
    }
    if ($mesi==2) {
      $mesli="Feb";
    }
    if ($mesi==3) {
      $mesli="Mar";
    }
    if ($mesi==4) {
      $mesli="Abr";
    }
    if ($mesi==5) {
      $mesli="May";
    }
    if ($mesi==6) {
      $mesli="Jun";
    }
    if ($mesi==7) {
      $mesli="Jul";
    }
    if ($mesi==8) {
      $mesli="Ago";
    }
    if ($mesi==9) {
      $mesli="Sep";
    }
    if ($mesi==10) {
      $mesli="Oct";
    }
    if ($mesi==11) {
      $mesli="Nov";
    }
    if ($mesi==12) {
      $mesli="Dic";
    }
  echo $mesli.$anoi;
  }

  ?>

@endsection
