@extends('templates.home')


@section('content')
<?php
require 'phpqrcode/qrlib.php';
$dir = 'multimedia/img_qr/';
if(!file_exists($dir)){
		mkdir($dir);
}
$filename = $dir.$cod_pieza.'.png';
$tamanio =14;
$level ='H';
$framsize =1;
$contenido = $cod_pieza;

if(!file_exists($filename)){
		qrcode::png($contenido,$filename,$level,$tamanio,$framsize);
}
?>

<form action="{{action('AsistenteController@guardarQR')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="file" value="{{ $filename }}">
    <input type="hidden" name="cod_pieza" value="{{ $cod_pieza }}">
    <input type="submit" id="botonEnviar" value="" style="border:none; background-color: #FFFFFF;">
</form>
<div class="container">
	<div class="center">
		<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue-only">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
		<div class="center">
			<h4 >Generando codigo QR</h4>
		</div>
</div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
		$(document).ready(function(){
				$("#botonEnviar").click();
		});
</script>
@endsection
