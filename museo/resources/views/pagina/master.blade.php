<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- Begin Head -->
    <head>
        <!-- Basic -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Museo de historia</title>
        <meta name="keywords" content="Museo Historia Xela Quetzaltenango Occidente Guatemala" />
        <meta name="description" content="Megakit - HTML5 Theme">

        <!-- Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noticia+Text:700|Poppins:700" rel="stylesheet">
        <!-- Vendor Styles -->
        <link href="{{URL::asset('pagina/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/css/animate.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/vendor/themify/themify.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/vendor/scrollbar/scrollbar.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/vendor/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/vendor/cubeportfolio/css/cubeportfolio.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{URL::asset('pagina/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('pagina/css/global/global.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="pagina/img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="pagina/img/apple-touch-icon.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <!-- End Head -->

    <!-- Body -->
    <body>
      <!--========== HEADER V2 ==========-->
      <header class="navbar-fixed-top s-header-v2 js__header-sticky">
          <!-- Navbar -->
          <nav class="s-header-v2__navbar">
              <div class="container g-display-table--lg">
                  <!-- Navbar Row -->
                  <div class="s-header-v2__navbar-row">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="s-header-v2__navbar-col">
                          <button type="button" class="collapsed s-header-v2__toggle" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                              <span class="s-header-v2__toggle-icon-bar"></span>
                          </button>
                      </div>

                      <div class="s-header-v2__navbar-col s-header-v2__navbar-col-width--180">
                          <!-- Logo -->
                          <div class="s-header__logo">
                              <a href="{{ url('/') }}" class="s-header-v2__logo-link">
                                <img class="s-header__logo-img s-header__logo-img-default" src="{{URL::asset('pagina/img/logo-blanco-prueba.png')}}" alt="SBX Logo">
                                <img class="s-header__logo-img s-header__logo-img-shrink" src="{{URL::asset('pagina/img/logo-blanco-prueba.png')}}" alt="SBX Logo">
                              </a>
                          </div>
                          <!-- End Logo -->
                      </div>

                      <div class="s-header-v2__navbar-col s-header-v2__navbar-col--right">
                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse s-header-v2__navbar-collapse" id="nav-collapse">
                              <ul class="s-header-v2__nav">
                                  <!-- Home -->
                                  <li class="dropdown s-header-v2__nav-item s-header-v2__dropdown-on-hover">
                                      <a href="index.html" class="dropdown-toggle s-header-v2__nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Museo<span class="g-font-size-10--xs g-margin-l-5--xs ti-angle-down"></span></a>
                                      <ul class="dropdown-menu s-header-v2__dropdown-menu">
                                          <li><a href="{{ url('/administracion') }}" class="s-header-v2__dropdown-menu-link">Administración</a></li>
                                          <li><a href="/#eventos" class="s-header-v2__dropdown-menu-link">Eventos</a></li>
                                          <li><a href="{{ url('/#piezas') }}" class="s-header-v2__dropdown-menu-link">Piezas</a></li>
                                          <li><a href="{{ url('/libros') }}" class="s-header-v2__dropdown-menu-link">Libros</a></li>

                                      </ul>
                                  </li>
                                  <!-- End Home -->

                                  <!-- Pages -->
                                  <li class="dropdown s-header-v2__nav-item s-header-v2__dropdown-on-hover">
                                      <a href="javascript:void(0);" class="dropdown-toggle s-header-v2__nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Historia<span class="g-font-size-10--xs g-margin-l-5--xs ti-angle-down"></span></a>
                                      <ul class="dropdown-menu s-header-v2__dropdown-menu">
                                          <li><a href="{{ url('/presidentes') }}" class="s-header-v2__dropdown-menu-link">Presidentes del occidente</a></li>
                                          <li><a href="{{ url('/ferrocarril') }}" class="s-header-v2__dropdown-menu-link">Ferrocarril de los Altos</a></li>
                                      </ul>
                                  </li>
                                  <!-- End Pages -->
                                  <li class="s-header-v2__nav-item"><a href="#eventos" class="s-header-v2__nav-link">Eventos</a></li>
                                  <li class="s-header-v2__nav-item"><a href="#piezas" class="s-header-v2__nav-link">Piezas</a></li>
                                  <li class="s-header-v2__nav-item"><a href="{{ url('/login') }}" class="s-header-v2__nav-link s-header-v2__nav-link--dark">Panel Administrativo</a></li>
                              </ul>
                          </div>
                          <!-- End Nav Menu -->
                      </div>
                  </div>
                  <!-- End Navbar Row -->
              </div>
          </nav>
          <!-- End Navbar -->
      </header>
      <!--========== END HEADER V2 ==========-->

        @yield('contenido')

        <!--========== FOOTER ==========-->
        <footer class="g-bg-color--dark">
            <!-- Links -->
            <div class="g-hor-divider__dashed--white-opacity-lightest">
                <div class="container g-padding-y-50--xs">
                    <div class="row">
                      <div class="col-sm-2 g-margin-b-10--xs g-margin-b-0--md">
                          <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                              <li><a class="g-font-size-15--xs g-color--white-opacity"  href="https://www.facebook.com/MuseodeQuetzaltenango/"><i class="g-color--white g-font-size-20--xs  ti-facebook"></i>Facebook</a></li>
                              <li><a class="g-font-size-15--xs g-color--white-opacity" href="https://www.youtube.com/channel/UCBI2nUnge2cS7oFGmVKoDSA/"><i class="g-color--white g-font-size-20--xs  ti-youtube"></i>YouTube</a></li>
                          </ul>
                      </div>
                        <div class="col-sm-3 g-margin-b-20--xs g-margin-b-0--md">
                          <h4 class="g-font-size-18--xs g-color--white-opacity g-margin-b-5--xs"><i class="g-color--white g-font-size-20--xs  ti-location-pin"></i>Ubicación</h4>
                          <p class="g-font-size-8--xs g-color--white"> 4ta. Calle y 19 Av. zona 3, tercer nivel de Centro Intercultural</p>
                        </div>
                        <div class="col-sm-3 g-margin-b-40--xs g-margin-b-0--md">
                          <h4 class="g-font-size-18--xs g-color--white-opacity g-margin-b-5--xs"><i class="g-color--white g-font-size-20--xs  ti-alarm-clock"></i>Horario</h4>
                          <p class="g-color--white">De Lunes a Domingo de 9:00 am a 8:00 pm</p>
                        </div>

                        <div class="col-md-4  col-sm-3 g-padding-y-0--md">
                            <h3 class="g-font-size-18--xs g-color--white">Museo</h3>
                            <p class="g-color--white-opacity">Página oficial del Museo de Historia de Quetzaltenango</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Links -->

            <!-- Copyright -->
            <div class="container g-padding-y-20--xs">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="index.html">
                            <img src="pagina/img/logo-blanco-lg.PNG" alt="Logo Museo">
                        </a>
                    </div>
                    <div class="col-xs-6 g-text-right--xs">
                      <p class="g-font-size-14--xs g-margin-b-0--xs g-color--white-opacity-light">Creado por: <a href="{{ url('/team') }}">Desarrolladores</a></p>
                    </div>
                </div>
            </div>
            <!-- End Copyright -->
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

        <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
        <!-- Vendor -->
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/jquery.migrate.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/jquery.smooth-scroll.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/jquery.back-to-top.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/swiper/swiper.jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/waypoint.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/counterup.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/vendor/jquery.parallax.min.js')}}"></script>

        <script type="text/javascript" src="{{URL::asset('pagina/vendor/jquery.wow.min.js')}}"></script>

        <!-- General Components and Settings -->
        <script type="text/javascript" src="{{URL::asset('pagina/js/global.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/header-sticky.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/scrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/magnific-popup.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/swiper.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/counter.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/portfolio-3-col.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('pagina/js/components/wow.min.js')}}"></script>
        <!--========== END JAVASCRIPTS ==========-->
    </body>
    <!-- End Body -->
  </html>
