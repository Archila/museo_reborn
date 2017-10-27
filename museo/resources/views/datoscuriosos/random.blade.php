@extends('templates.home')
@section('content')
  <div class="row scrollspy ">
   <div class="col s12 m12 l12">
   <div class="card-panel">
   <h3 class="center-align">Dato curioso</h3>

  @foreach ($dator as $dato)
<h5>{{$dato->dato}}</h5>
    @endforeach

  </div>
  </div>
  </div>

<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')

@endsection
