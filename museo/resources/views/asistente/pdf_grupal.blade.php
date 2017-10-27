<!DOCTYPE html>
<html>
  <head>    
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/ghpages-materialize.css')}}"  media="screen,projection"/>        
     
   </head>
<body>


        @foreach ($piezas as $p)
          @if (!is_null($p->codigo_qr))
            <div class="col s12 m12 l6 card white">
              <div class="card-content black-text center-align ">
                        <h5 >{{$p->nombre}}</h5>
                        <img src="{{$p->codigo_qr}}">
                  </div>        
              
            </div> 
          @endif    
        @endforeach     
  
  </body>

</html>