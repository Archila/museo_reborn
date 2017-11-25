@extends('templates.home')

@section('content')

<div class="container">

	<div class="row ">

		<iframe id="js__scroll-to-section" src="/ficha/{{$pieza->cod_pieza}}" style="width:120%; height:720px; border:none;" scrolling="no">
		  <p>Your browser does not support iframes.</p>
		</iframe>
	</div>
</div>
@endsection
<script type="text/javascript">
	 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
