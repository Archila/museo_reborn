@extends('templates.home')

@section('content')
<div class="row">
	<div class="center">
		<h5 class="light">Codigo QR</h5>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col s6  offset-s3" style="border:1px">
			  <div class="center">
	        <img  src="{{URL::asset($pieza->codigo_qr)}}">
	        <h5 >{{$pieza->nombre}}</h5>
	      </div>
			<form  action="{{route('PDF.store')}}" method="POST" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				   {{ method_field('POST') }}
				<input type="hidden"  name="cod_pieza" value="{{$pieza->cod_pieza}}">
				<div class="input-field center">
					<button class="btn light-blue waves-effect waves-light center" type="submit" name="action">
						<i class="material-icons right">insert_drive_file</i>Generar PDF
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('section')
  <div class="center">
    <i class="medium material-icons">picture_as_pdf</i>
    <p><strong>Generar PDF:</strong>Se creara un archivo .PDF con el codigo QR de la pieza seleccionada para poder ser impresa</p>
  </div>
@endsection