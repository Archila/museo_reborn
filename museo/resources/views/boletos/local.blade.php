@extends('templates.home')

@section('content')

<iframe id="js__scroll-to-section" src="http://127.0.0.1:8800/boleto" style="width:100%; height:555px; border:none;" scrolling="no">
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
