@extends('pagina.master')
@section('title', 'Museo Historia')
@section('contenido')
<!--========== SWIPER SLIDER ==========-->
<div class="s-swiper js__swiper-one-item">
    <!-- Swiper Wrapper -->
        <!-- aqui es donde debo de modificar -->
    <div class="swiper-wrapper">
      <?php
       $cont=1;
      $date=0;
      $dia="";
      $datos[]="";
      $mesli="";
      $meslf="";

      ?>
        @foreach ($eventos as $evento)
        <?php
        $cont++;

        $datei=$evento->fecha_inicial;
        $arrayFechai = explode("-", $datei, 3);
        $anoi=$arrayFechai[0];
        $mesi=$arrayFechai[1];
        $diai=$arrayFechai[2];

        if ($mesi==1) {
          $mesli="Ene";
        }
        if ($mesi==2) {
          $mesli="Feb";
        }
        if ($mesi==3) {
          $mesli="Mar";
        }
        if ($mesi==4) {
          $mesli="Abr";
        }
        if ($mesi==5) {
          $mesli="May";
        }
        if ($mesi==6) {
          $mesli="Jun";
        }
        if ($mesi==7) {
          $mesli="Jul";
        }
        if ($mesi==8) {
          $mesli="Ago";
        }
        if ($mesi==9) {
          $mesli="Sep";
        }
        if ($mesi==10) {
          $mesli="Oct";
        }
        if ($mesi==11) {
          $mesli="Nov";
        }
        if ($mesi==12) {
          $mesli="Dic";
        }


        $datef=$evento->fecha_final;
        $arrayFechaf = explode("-", $datef, 3);
        $anof=$arrayFechaf[0];
        $mesf=$arrayFechaf[1];
        $diaf=$arrayFechaf[2];

        if ($mesf==1) {
          $meslf="Ene";
        }
        if ($mesf==2) {
          $meslf="Feb";
        }
        if ($mesf==3) {
          $meslf="Mar";
        }
        if ($mesf==4) {
          $meslf="Abr";
        }
        if ($mesf==5) {
          $meslf="May";
        }
        if ($mesf==6) {
          $meslf="Jun";
        }
        if ($mesf==7) {
          $meslf="Jul";
        }
        if ($mesf==8) {
          $meslf="Ago";
        }
        if ($mesf==9) {
          $meslf="Sep";
        }
        if ($mesf==10) {
          $meslf="Oct";
        }
        if ($mesf==11) {
          $meslf="Nov";
        }
        if ($mesf==12) {
          $meslf="Dic";
        }
        ?>

        <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('pagina/img/1920x1080/lucesabajo.jpg');">
            <div class="container g-ver-center--sm g-padding-y-125--xs g-padding-y-0--sm">

              <div class="g-margin-t-30--xs g-margin-t-0--sm g-margin-b-30--xs g-margin-b-70--md">
                  <h1 class="g-font-size-30--xs g-font-size-40--sm g-font-size-45--lg g-color--white-opacity">Evento:</h1>
                  <h1 class="g-font-size-35--xs g-font-size-45--sm g-font-size-50--lg g-color--white">{{$evento->nombre}}.</h1>
              </div>

              <div class="row">
                  <div class="col-sm-8 col-sm-push-4 g-margin-b-50--xs g-margin-b-0--md">
                      <div class="s-promo-block-v3__divider g-display-none--xs g-display-block--md"></div>
                      <div class="row">
                          <div class="col-sm-6 g-margin-b-30--xs g-margin-b-0--md">
                              <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".4s">
                                  <p class="g-font-size-18--xs g-color--white">{{$evento->descripcion}}.</p>
                              </div>
                          </div>
                          <div class="col-sm-5 col-sm-offset-1">
                              <div class="clearfix">
                                  <div class="pull-left">
                                      <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">

                                          <span class="s-promo-block-v3__date g-font-size-50--xs g-font-size-50--lg g-font-weight--300 g-color--primary">{{$diai}}</span>
                                      </div>
                                  </div>
                                  <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                                      <span class="s-promo-block-v3__month g-font-size-18--xs g-font-size-22--lg g-font-weight--300 g-color--white-opacity-light">{{$mesli}}</span>
                                      <span class="s-promo-block-v3__year g-font-size-18--xs g-font-size-22--lg g-font-weight--300 g-color--white-opacity-light">{{$anoi}}</span>
                                  </div>
                              </div>
                          </div>

                          <div class="col-sm-5 col-sm-offset-1">
                              <div class="clearfix">
                                  <div class="pull-left">
                                      <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                                          <span class="s-promo-block-v3__date g-font-size-50--xs g-font-size-50--lg g-font-weight--300 g-color--primary">{{$diaf}}</span>
                                      </div>
                                  </div>
                                  <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                                      <span class="s-promo-block-v3__month g-font-size-18--xs g-font-size-22--lg g-font-weight--300 g-color--white-opacity-light">{{$meslf}}</span>
                                      <span class="s-promo-block-v3__year g-font-size-18--xs g-font-size-22--lg g-font-weight--300 g-color--white-opacity-light">{{$anof}}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>



            </div>
        </div>
        @endforeach

    </div>
        <!-- aqui es donde debo de modificar -->
    <!-- End Swiper Wrapper -->

    <!-- Arrows -->
    <a href="javascript:void(0);" class="s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
    <a href="javascript:void(0);" class="s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
    <!-- End Arrows -->

</div>
<!--========== END SWIPER SLIDER ==========-->


@endsection
