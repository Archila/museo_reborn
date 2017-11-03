@extends('templates.home')
@section('title', 'Libros')
@section('content')


<style type="text/css">
.bgimg {
background-image: url('{{URL::asset("images/libro2.png")}}');
background-repeat: no-repeat;
background-size: 100% 100%;
}
</style>
<div class="container">


<div class="row">
<div class="center"><br>
<h4 class="light text-light-blue text-darken-4"><i class="material-icons prefix">search</i>Busqueda de libros<i class="material-icons prefix">book</i></h4>
</div>
</div>
<div class="row">
<div class="center">
<div class="col s10 m8 l6 offset-s1 offset-s2 offset-l3 center">
<nav>
<div class="nav-wrapper teal darken-3">
  <div class="input-field">
    <input id="buscar" type="search" placeholder="Nombre de libro, autor, categoria" onclick="ocular()" >
    <label class="label-icon" for="search"><i class="material-icons prefix">search</i></label>
    <i class="material-icons">close</i>
  </div>
</div>
</nav>
</div>
</div>
</div>

<div class="row section scrollspy">
<div class="row">
   <section>
   </section>
</div>
</div>

</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
$(document).ready(function(){
$value=$(this).val();
$.ajax({
  type : 'get',
   url : '{{URL::to('buscarLibro2')}}',
   data : {'search':$value},
   success:function(data){
     $('section').html(data);
   }
});
buscarDon();
});

</script>
<script>

function ocultar(){
document.getElementById('libros').style.display = 'none';
}


function buscarDon()
{
$('#buscar').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('buscarLibro')}}',
data : {'search':$value},
success:function(data){
 $('section').html(data);
}
});
})
}

</script>

@endsection
@section('section')
<blockquote>
      Es una lista de los libros disponibles en la biblioteca.
</blockquote>
@endsection
