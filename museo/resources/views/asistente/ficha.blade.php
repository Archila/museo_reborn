<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ficha</title>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/ghpages-materialize.css')}}"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet" />

    <script type="text/javascript" src="{{URL::asset('js/init.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.timeago.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/prism.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('bin/materialize.js')}}"></script>

    <style>
    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
    @import url(https://fonts.googleapis.com/css?family=Lato:300|Oswald);
    .slides {
      position: relative;
      margin-top: -35px;
    }
    .slides .slide {
      position: absolute;
      top: 0;
      width: calc(33% - 1em);
      max-height: 3.5em;
      margin: 0.5em;
      padding: 1em;
      background: #03a9f4 ;
      color: white;
      float: left;
      overflow: hidden;
      transition: max-height 0.25s       ease-in-out, width      0.25s 0.25s ease-in-out, left       0.25s 0.5s  ease-in-out, top        0.25s 0.75s ease-in-out;
    }
    .slides .slide:nth-child(1) {
      left: 0%;
    }
    .slides .slide:nth-child(2) {
      left: 33.3333%;
    }
    .slides .slide:nth-child(3) {
      left: 66.6666%;
    }
    .slides .slide > a {
      display: block;
      padding-bottom: 1em;
      font-family: 'Oswald';
      text-transform: uppercase;
      text-decoration: none;
      color: #004d40 ;
      transition: color 2s;
    }
    .slides .slide.active {
      position: absolute;
      top: 4.5em;
      left: 0;
      width: 100%;
      max-height: 20em;
      float: none;
      transition: top        0.25s 1s    ease-in-out, left       0.25s 1.25s ease-in-out, width      0.25s 1.5s  ease-in-out, max-height 0.25s 1.75s ease-in-out;
    }
    .slides .slide.active a {
      color: white;
    }

    /** PAGE STYLES **/
    *, *:before, *:after {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    html, body {
      width: 100%;
      height: 100%;
    }

    html {
      font-size: 62.5%;
    }

    body {
      background: #81d4fa ;
      font-family: 'Lato', sans-serif;
      font-size: 2em;
      line-height: 1.5;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }


    /**
     * For modern browsers
     * 1. The space content is one way to avoid an Opera bug when the
     *    contenteditable attribute is included anywhere else in the document.
     *    Otherwise it causes space to appear at the top and bottom of elements
     *    that are clearfixed.
     * 2. The use of `table` rather than `block` is only necessary if using
     *    `:before` to contain the top-margins of child elements.
     */
    .cf:before, .slides:before,
    .cf:after,
    .slides:after {
      content: " ";
      /* 1 */
      display: table;
      /* 2 */
    }

    .cf:after, .slides:after {
      clear: both;
    }

    /**
     * For IE 6/7 only
     * Include this rule to trigger hasLayout and contain floats.
     */
    .cf, .slides {
      *zoom: 1;
    }

        </style>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  </head>
  <body>
    <?php
        $multimedia =URL::asset($pieza->fotografia);
        if (!is_null($ficha->multimedia)) {
          $multimedia=URL::asset($ficha->multimedia);
        }

        ?>
        <div class="container">
          <div class="row center-align">
            <img src="/images/museologo.png" alt="" style="hidth: 30px; height:120px;" class="center-align">
          </div>
          <div class="row">
            <div class="slides">

              <div class="slide">
                <a href="#">Pieza</a>
                <div class="content">
                  <div class="row">
                    <div class="col m6 l6 ">
                      <div class="col m4">
                        <h4>Nombre:</h4>
                      </div>
                      <div class="col m8">
                        <h4><b>{{$pieza->nombre}}</b></h4>
                      </div>
                      <div class="col m4">
                        <h4>Época:</h4>
                      </div>
                      <div class="col m8">
                        <h4><b>{{$ficha->epoca}}</b></h4>
                      </div>
                    </div>
                    <div class="col m6 l6 center-align">
                      <img src="{{URL::asset($pieza->fotografia)}}" alt="" style="width: 320px; height:200px;" class="materialboxed">
                    </div>
                  </div>

                </div>
              </div>

              <div class="slide">
                <a href="#">Información</a>
                <div class="content" style="font-size: 1.2em; text-align : justify;">
                  {{$ficha->historia}}
                </div>
              </div>

              <div class="slide">
                <a href="#">Multimedia</a>
                <div class="content" >
                  <div class="row center-align">
                    <div class="col m12 center-align">
                      @if($ficha->multimedia != "")
                      <div class="col m6 offset-m3">
                        <img class="materialboxed" style="width: 100%; height:auto;" src="{{URL::asset($ficha->multimedia)}}">
                      </div>
                      @elseif($ficha->video != "")
                        <iframe width="620" height="360" src="{{$ficha->video}}" frameborder="0" allowfullscreen></iframe>
                      @else
                        <div class="col m6 offset-m3">
                          <img class="materialboxed" style="width: 100%; height:240px;" src="/images/no_multimedia.jpg" class="center-align">
                        </div>

                      @endif
                    </div>

                  </div>
                </div>
              </div>



          </div>

        </div>
      </div>

  </body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript">
  $('.slide a').click(function () {
    $('.slide.active').removeClass('active');
    $(this).closest('.slide').addClass('active');
    return false;
  });
  </script>
</html>
