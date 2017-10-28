<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Museo de Historia</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#1b5a6b">

    <link rel="icon" href="{{URL::asset('Images/mphoto.png')}}" sizes="32x32">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/ghpages-materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style media="screen">
      .waves-effect.waves-sbx .waves-ripple {background-color: rgba(2, 86, 156, 1);}
      body {display: flex;min-height: 100vh;flex-direction: column;}
      main {flex: 1 0 auto;}

      .input-field div.error{
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color:#f10d0d;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
      }
      .input-field label.active{
          width:100%;
      }
      .left-alert input[type=text] + label:after,
      .left-alert input[type=password] + label:after,
      .left-alert input[type=email] + label:after,
      .left-alert input[type=url] + label:after,
      .left-alert input[type=time] + label:after,
      .left-alert input[type=date] + label:after,
      .left-alert input[type=datetime-local] + label:after,
      .left-alert input[type=tel] + label:after,
      .left-alert input[type=number] + label:after,
      .left-alert input[type=search] + label:after,
      .left-alert textarea.materialize-textarea + label:after{
          left:0px;
      }
      .right-alert input[type=text] + label:after,
      .right-alert input[type=password] + label:after,
      .right-alert input[type=email] + label:after,
      .right-alert input[type=url] + label:after,
      .right-alert input[type=time] + label:after,
      .right-alert input[type=date] + label:after,
      .right-alert input[type=datetime-local] + label:after,
      .right-alert input[type=tel] + label:after,
      .right-alert input[type=number] + label:after,
      .right-alert input[type=search] + label:after,
      .right-alert textarea.materialize-textarea + label:after{ right:70px;}
      /* label color */
    .input-field label {
     color: #1792a4;
    }
    /* label focus color */
    .input-field input[type=email]:focus + label {color: #1792a4;}
    .input-field input[type=password]:focus + label {color: #1792a4;}
    .input-field input[type=checkbox]:focus + label {color: #1792a4;}
    /* label underline focus color */
    .input-field input[type=email]:focus {border-bottom: 1px solid #1792a4;box-shadow: 0 1px 0 0  #1792a4;}
    .input-field input[type=password]:focus {border-bottom: 1px solid #1792a4;box-shadow: 0 1px 0 0  #1792a4;}
    .input-field input[type=checkbox]:focus {border-bottom: 1px solid #1792a4;box-shadow: 0 1px 0 0  #1792a4;}
    /* valid color */checkbox
    .input-field .prefix.active {  color: #1792a4;}
    </style>
</head>

<body >
    <nav class="top-nav  light-blue darken-4">
      <div class="container ">
        <div >
        <img class="left"  src="{{URL::asset('images/logo-biblioteca.png')}}" width="330" height="120"  alt="">
        </div>
      </div>
    </nav>

<bdi>
  <div class="row">
    <div class="col s12 m12 l12">
      <div class="section scrollspy">

        @yield('contenido')

      </div>
    </div>

    <div class="col hide-on-small-only m12 l2 s12">
      <div class="toc-wrapper">
        <div style="height: 1px;">

          @yield('sections')

        </div>
      </div>
    </div>
  </div>
</bdi>

<footer class="page-footer light-blue darken-4">
  <div class="container">
        <div class="row">
          <div class="col l4 s12">
            <h5 class="white-text"><i class="material-icons">pin_drop</i>Ubicación</h5>
            <p class="grey-text text-lighten-4">Segundo Nivel, Centro Interculltural</p>
          </div>
          <div class="col l4 s12">
            <h5 class="white-text"><i class="material-icons">alarm</i>Horario</h5>
            <p class="grey-text text-lighten-4">De Lunes a Domingo de 9:00 am a 8:00 pm</p>
          </div>
          <div class="col l4 s12" style="overflow: hidden;">
            <h5 class="white-text"><i class="material-icons">touch_app</i>Conectar</h5>
            <a href="https://www.facebook.com/BibliotecaPublicaQuetzaltenango">
            <div class="chip indigo darken-4 white-text">
               <img src="pagina/img/facebook.png" alt="Facebook">
               @BibliotecaPublicaQuetzaltenango
            </div>
            </a>
            <div class="chip deep-purple darken-1 white-text">
               <img src="pagina/img/phonelogo.png" alt="Facebook">
               5058 1108
            </div>
          </div>
        </div>
      </div>

</footer>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('js/valid.js')}}"></script>
<script src="{{URL::asset('js/prism.js')}}"></script>
<script src="{{URL::asset('jade/lunr.min.js')}}"></script>
<script src="{{URL::asset('jade/search.js')}}"></script>
<script src="{{URL::asset('bin/materialize.js')}}"></script>
<script src="{{URL::asset('js/init.js')}}"></script>
</body>

    <!--  Scripts-->


</html>
