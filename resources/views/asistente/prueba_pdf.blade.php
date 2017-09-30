<!DOCTYPE html>
<html>
  <head>
     
    <style>
 
.col12 {
    width: 100%;
    text-align: center;
    margin: 0;
} 
.col6  {
    width: 45%;
    height: 45%;
    border-color: black;    
    text-align: center;
    margin: 2em;
    float: left;
} 

.marco {
    width: 105%;
    height: 28em;
    border-color: black;
    margin: 0;      
    padding: 0;
    text-align: center;
    align-self: center; 
    align-items: center;
    margin-left: 21%;    
}

.superior {
  width: 55%;
  height: 6em;
  text-align:center;
  align-items: center;
}

.izquierda{
  background-color: white;
  width: 18%;
  height: 25em;
  align-self: left;
  float: left;
}

.centro{
  width: 53%;
  height: 22em;
  border-color: black;
  border-style: ridge;
  align-self: left;
  text-align: center;
  float: left;
  margin-left: 0.5em;
}

.derecha{

  width: 18%;
  height: 25em;
  background-color: white;
  align-self: left;
  float: right;
}

.inferior{
  width: 100%;
  height: 5em;
}
.qr{
  width: 6.5cm;
  height: 6.5cm;
  align-self: center;
}
.encabezado{
  width:100%;
  height:100%;"
}

.logo{
  width: 100%;
  height: 30%;
  margin-top: 100%;
}
.pie{
  width: 64%;
  height: 100%; 
}
.box {
    position: relative;
    border-radius: 3px;
    
    
    
}
</style>
    
   </head>
<body >  
   
      <?php
      $cont =0;  
      /*foreach ($piezas as $p)
      {             
        if (!is_null($p->codigo_qr))
        {
              echo '<div class="col12">';                       
              echo '<h1 class="titulo">'.$p->nombre.'</h1>';              
              
              echo '<img class="qr" src="'.$p->codigo_qr.'" border-style:solid;>';
              echo '</div>';                         
          
        }        
      }*/
    ?>        
    
      {{--@foreach ($piezas as $p)--}}    
           
        <div class="marco">
         <div class="superior">
        <img class="encabezado" src="images/museologo.jpg" >        
        </div>     
      <div class="centro">
        <h2>{{$piezas->nombre}}</h2>
        <img class="qr" src="{{$piezas->codigo_qr}}">
      </div>
      </div>      
      <br>
      {{--@endforeach--}}
           
</body>
</html>
