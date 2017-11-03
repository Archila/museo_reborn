@extends('pagina.master')
@section('title', 'Museo Historia')
@section('contenido')
<!--========== PROMO BLOCK ==========-->
        <div class="g-fullheight--md js__parallax-window" style="background: url(pagina/img/1920x1080/librosantiguos.jpg) 50% 0 no-repeat fixed;">
            <div class="g-container--md g-text-center--xs g-ver-center--md g-padding-y-150--xs g-padding-y-0--md">
                <div class="g-margin-b-60--xs">
                    <h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1">Libros</h1>
                    <p class="g-font-size-18--xs g-font-size-26--md g-color--white g-margin-b-0--xs">En esta página podra buscar libros que se encuentran en la Biblioteca Pública de Quetzaltenango</p>
                    <img class="logo-img s-header" src="{{URL::asset('images/logo-biblioteca.png')}}" width="500" height="150" alt="Biblioteca Logo">
                </div>
            </div>
        </div>
        <!--========== END PROMO BLOCK ==========-->
<iframe src="http://104.236.19.18/libros" style="width:100%; height:1000px;" scrolling="no">
  <p>Your browser does not support iframes.</p>
</iframe>

@endsection
