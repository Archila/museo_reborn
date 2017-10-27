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

  </head>
<body>

<div id="jqueryvalidation" class="section">
<div class="container">
   <div class="row">
    <div class="col s12 m12 l12">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <h4 class="header2">@yield('encabezado')</h4>
          @yield('contenido')          
        </div>
      </div>
    </div>
  </div>  
</div> 
</div>
  </body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
    $('select'  ).material_select();
    });
  </script>
