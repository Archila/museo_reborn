<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ficha</title>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/ghpages-materialize.css')}}"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet" />

    <script type="text/javascript" src="{{URL::asset('js/init.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.timeago.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/prism.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('bin/materialize.js')}}"></script>


  </head>
  <body>
    <div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
  </body>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();
  });
  </script>
</html>
