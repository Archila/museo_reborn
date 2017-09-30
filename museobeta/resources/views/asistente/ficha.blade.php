@extends('Asistente.home')

@section('titulo','Ficha')

@section('encabezado','Ficha Informativa')

@section('contenido')
<?php
	        $multimedia =URL::asset($pieza->fotografia);
	        if (!is_null($ficha->multimedia)) {
	        	$multimedia=URL::asset($ficha->multimedia);
	        }

	        ?>
<div class="container">

	<div class="row ">
	    <div class="col s12 m12 l6">
	      <div class="card teal light-blue accent-1 z-depth-4">
	      	<img  class="col s12 m12 l12" src="/images/museologo.jpg">
	        <div class="card-image ">
	                	
	          <img class="materialboxed" src="{{$multimedia}}">
	          <a class="btn-floating halfway-fab waves-effect waves-light green activator"><i class="material-icons">arrow_upward</i></a>
	        </div>
	        <div class="card-content">
	        	<span class="card-title "><h4>{{$pieza->nombre}}</h4></span>
	        </div>
	        <div class="card-reveal" style="background-color:#e1f5fe;">
			      <span class="card-title grey-text text-darken-4">{{$pieza->nombre}}<i class="material-icons right">arrow_downward</i></span>
			      <h5 class="left-align">Época: {{$ficha->epoca}}</h4>
			      <h5 class="center-align">{{$ficha->historia}}</h5>
			</div>
	      </div>
	    </div>

	<div class="fixed-action-btn ">
    <a href="/" class="btn-floating btn-large blue">
      <i class="large material-icons">account_balance</i>
    </a>
  </div>
	</div>



</div>
@endsection
<script type="text/javascript">
	 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
