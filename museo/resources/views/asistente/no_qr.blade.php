<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>

    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/ghpages-materialize.css')}}"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet" />

    <script type="text/javascript" src="{{URL::asset('js/init.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.timeago.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/prism.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('bin/materialize.js')}}"></script>
    <style media="screen">
    body {
      background-color: #039be5;
      }
      .check {
        width: 200px;
        height: 200px;
        border: 5px solid #000;
        margin: 20px auto;
      }
      .check > span {
        position: absolute;
        width: 200px;
        height: 200px;
        border-bottom: 5px solid red;
        animation-name: checking;
        animation-duration: 1s;
        animation-direction: alternate;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
      }
      .check > img {
        width: 200px;
        height: 200px;
      }
      @keyframes checking {
      0% {margin-top: 0px;}
      100% {margin-top: -200px;}
      }
      .header{
        font-size: 13.0rem;
        font-weight: 700;
        margin: 2% 0 2% 0;
        text-shadow: 0px 3px 0px #7f8c8d;
      }
      /* Error Styling */
      .error{
        margin: 0px 0 2% 0;
      	font-size: 3.7rem;
      	text-shadow: 0px 3px 0px #7f8c8d;
      	font-weight: 100;
      }
    </style>
  </head>
<body>
  <section class="center">
    <article>
      <h2 class="white-text">Museo de Historia de Quetzaltenango</h2>

      <div class="check">
      <span></span>
      <img src="http://www.qrcodify.com/code.php?URL=progromatic" />
      </div>
      <p class="error">QR inválido</p>
    </article>
    <div class="row">
      <div class="col m8 offset-m3">
        <span class="white-text" style="font-size: 3rem;"><b>Volver a escanear</b>
                <i class="material-icons large white-text right">arrow_forward</i></span>
      </div>
    </div>

  </section>

</body>

</html>
