@extends('templates.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="center">
      <h5 class="light">Inventario de piezas</h5>
    </div>
  </div>
@if(($piezas)==('[]'))
<h5 class=" center">No se han agregado piezas a la base de datos</h5>
@else

<div class="row">
  <div class="center">
<div class="col s10 m8 l6 offset-s1 offset-s2 offset-l3 center">
    <nav>
      <div class="nav-wrapper teal darken-3">
          <div class="input-field">
            <input id="buscar" type="search" placeholder="Nombre de pieza, tipo de pieza, tipo de adquisición " >
            <label class="label-icon" for="search"><i class="material-icons prefix">search</i></label>
            <i class="material-icons">close</i>
          </div>
      </div>
    </nav>
</div>
</div>
</div>
<div id="historia" class="row section scrollspy">
  <section>
  </section>

</div>
@endif
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
		$(document).ready(function(){
        $value=$(this).val();
        $.ajax({
          type : 'get',
           url : '{{URL::to('buscarpieza')}}',
           data : {'search':$value},
           success:function(data){
             $('section').html(data);
           }
        });
buscarDon();
		});

</script>
<script>

function buscarDon()
{
  $('#buscar').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type : 'get',
       url : '{{URL::to('buscarpieza')}}',
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
      Lista ordenada de bienes y demás cosas valorables que pertenecen a una persona, empresa o institución.
</blockquote>
@endsection
