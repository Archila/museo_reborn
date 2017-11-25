@extends('pagina.master')
@section('title', 'Museo Historia')
@section('contenido')
<!--========== PROMO BLOCK ==========-->
        <div class="g-fullheight--md js__parallax-window" style="background: url(pagina/img/1920x1080/libros.jpg) 100% 0 no-repeat fixed;">
            <div class="g-container--md g-text-center--xs g-ver-center--md g-padding-y-150--xs g-padding-y-0--md">
                <div class="g-margin-b-60--xs">
                    <h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1">Libros</h1>
                    <p class="g-font-size-18--xs g-font-size-26--md g-color--white g-margin-b-0--xs">En esta página podra buscar libros que se encuentran en la Biblioteca Pública de Quetzaltenango</p>
                    <img class="logo-img s-header" src="{{URL::asset('pagina/img/biblioteca.png')}}"  alt="Biblioteca Logo">
                </div>
                <div class="col-xs-4 g-full-width--xs g-margin-b-50--xs g-margin-b-0--sm">
                    <div class="g-text-center--xs">
                        <i class="g-display-block--xs g-font-size-40--xs g-color--white g-margin-b-30--xs ti-location-pin"></i>
                        <h4 class="g-font-size-18--xs g-color--white-opacity g-margin-b-5--xs">Ubicación</h4>
                        <p class="g-color--white"> 4ta. Calle y 19 avenida de la zona 3, Segundo nivel de Centro Intercultural</p>
                    </div>
                </div>
                <div class="col-xs-4 g-full-width--xs">
                    <div class="g-text-center--xs">
                        <i class="g-display-block--xs g-font-size-40--xs g-color--white g-margin-b-30--xs ti-headphone-alt"></i>
                        <h4 class="g-font-size-18--xs g-color--white-opacity g-margin-b-5--xs">Telefono</h4>
                        <p class="g-color--white">+ (502) 5058 1108</p>
                    </div>
                </div>
                <div class="col-xs-4 g-full-width--xs">
                    <div class="g-text-center--xs">
                        <i class="g-display-block--xs g-font-size-40--xs g-color--white g-margin-b-30--xs ti-alarm-clock"></i>
                        <h4 class="g-font-size-18--xs g-color--white-opacity g-margin-b-5--xs">Horario</h4>
                        <p class="g-color--white">De Lunes a Domingo de 9:00 am a 8:00 pm</p>
                    </div>
                </div>
            </div>
            <a href="#js__scroll-to-section" class="s-scroll-to-section-v1--bc g-margin-b-15--xs">
                <span class="g-font-size-20--xs  ti-angle-double-down" style="color: white;"></span>
                <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs"><strong>Buscar libros</strong></p>
            </a>
        </div>
        <!--========== END PROMO BLOCK ==========-->
<iframe id="js__scroll-to-section" src="https://104.236.19.18/libros" style="width:100%; height:1000px;" scrolling="yes">
  <p>Your browser does not support iframes.</p>
</iframe>

@endsection
