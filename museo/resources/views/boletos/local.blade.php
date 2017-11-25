@extends('templates.home')

@section('content')

<<<<<<< HEAD
<iframe id="js__scroll-to-section" src="https://127.0.0.1:8800/boleto" style="width:100%; height:555px; border:none;" scrolling="no">
=======
<iframe id="js__scroll-to-section" src="http://127.0.0.1:8800/boletos" style="width:100%; height:555px; border:none;" scrolling="no">
>>>>>>> 912de72adca10c2478aae2dee250525268f353f6
  <p>Your browser does not support iframes.</p>
</iframe>
@include('sweet::alert')
@endsection

@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Boleto:</strong><br>
    Documento que se entrega a la persona interesada en el que se garantiza que esta ha realizado el pago por un servicio.</p>
  </div>
@endsection
