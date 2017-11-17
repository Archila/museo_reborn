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

    <style media="screen">


    #all{
    	width:100%;
    	height:100%;
    	overflow-x:hidden;
    	overflow-y: visible;
        position:relative;
    }

    body{
    	font-family: Helvetica, Arial, sans-serif;
    	font-size:12pt;
    	background: white;
    	color:#352e2a;

    }

    a:link, a:visited {
    	color: #333;
    	border-bottom:1px solid #333;
    	-webkit-transition: .3s;
    	-moz-transition: .3s;
    	transition: .3s;
    	text-decoration:none;
    }

    a:hover {
    	color: #000;
    	border-bottom:1px solid #000;
    	text-decoration:none;
    }

    img{
        width:100%;
    }

    #allcontent{
    	margin: 25px auto 0 auto;
        width:100%;
        max-width:800px;
        height:800px;
        position:relative;
    	-webkit-animation: comein 1.5s ease-in-out;
    	-moz-animation: comein 1.5s ease-in-out;
    	animation: comein 1.5s ease-in-out;
    }

    .portfolio{
        width:100%;
        max-width:500px;
        position:absolute;
        right:0;
        top:0;
        -webkit-transition: .5s;
        -moz-transition: .5s;
        transition: .5s;
        cursor:pointer;
    	-webkit-box-shadow:-2px 0 3px rgba(0,0,0,0.3);
    	-moz-box-shadow:-2px 0 3px rgba(0,0,0,0.3);
    	box-shadow:-2px 0 3px rgba(0,0,0,0.3);
    }


    .portfolio:nth-child(1) {
    	left: 5px;
    }


    .portfolio:nth-child(2) {
    	left: 10%;
    }


    .portfolio:nth-child(3) {
    	left: 20%;
    }


    .portfolio:nth-child(4) {
    	left: 30%;
    }

    .portfolio:nth-child(5) {
    	left: 40%;
    }
    .portfolio:nth-child(5):hover {
    	-webkit-transform: rotate(-2deg);
        -moz-transform: rotate(-2deg);
        transform: rotate(-2deg);
    	left: 35%;
    }

    .opened {
    	z-index: 1000;
    	left:0 !important;
    	-webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-box-shadow:0 0 3px rgba(0,0,0,0.3);
    	-moz-box-shadow:0 0 3px rgba(0,0,0,0.3);
    	box-shadow:0 0 3px rgba(0,0,0,0.3);
    	width:100%;
        max-width:1140px;
    }

    .opened img{
    		z-index:5;
    }

    .ombra{
    	position:absolute;
        bottom:20px;
        left:10px;
        width:90%;
    	height:10px;
    	-webkit-box-shadow:0 15px 10px rgba(0, 0, 0, 0.7);
    	-moz-box-shadow:0 15px 10px rgba(0, 0, 0, 0.7);
    	box-shadow:0 15px 10px rgba(0, 0, 0, 0.7);
    	-webkit-transform:rotate(-2deg);
    	-moz-transform:rotate(-2deg);
    	transform:rotate(-2deg);
    	display:none;
    	z-index:-1;
    }

    .ombra:after{
    	display:block;
    	content:"";
    	position:absolute;
        bottom:-8px;
        right:-93px;
        width:90%;
    	height:20px;
    	-webkit-box-shadow:0 15px 10px rgba(0, 0, 0, 0.7);
    	-moz-box-shadow:0 15px 10px rgba(0, 0, 0, 0.7);
    	box-shadow:0 15px 10px rgba(0, 0, 0, 0.7);
    	-webkit-transform:rotate(4deg);
    	-moz-transform:rotate(4deg);
    	transform:rotate(4deg);
    }

    .txt{
      display:block;
    	margin: -2px 0 0 0;
    	padding-top: 0px;
    	width:100%;
    	height:100px;
    	background: #f7f7f7;
    }


    #navi{
    	position:absolute;
    	left:50%;
    	background:blue;
    	opacity:0.8;
    	color:black;
    	height:24px;
    	-webkit-border-radius:20px;
        -moz-border-radius:20px;
        border-radius:20px;
        padding:7px 10px 0 10px;
    }

    .circle{
    	display:inline-block;
    	width:15px;
    	height:15px;
    	-webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        background:#efefef;
        border:1px solid #000;
        margin-right:6px;
        cursor:pointer;
    }

    .circle:hover{
    	background:#fff;
    	border:1px solid #ccc;
    }

    .circle:active,
    .activenav,
    .activenav:hover{
    	background:cyan;
    	border:1px solid #333;
    }

    .activenav{
    	cursor: default;
    }

    .circle:last-child{
    	margin-right: 0;
    }



    /* loading */
    #loading{
    	width:100%;
    	height:100%;
    	margin:0;
    	padding:0;
    	top:0;
    	left:0;
    	z-index:10001;
    	position:absolute;
    }

    .loader{
        display: block;
        height: 30px;
        left: 50%;
        margin: -15px 0 0 -15px;
        position: absolute;
        top: 50%;
        width: 30px;
    	animation: spin 1s infinite linear;
    	-moz-animation: spin 1s infinite linear;
    	-webkit-animation: spin 1s infinite linear;
    }


    /*enter*/
    @-webkit-keyframes comein {
    	0% { opacity: 0; -webkit-transform: translateY(-3000px); }
    	80% { opacity: 1; -webkit-transform: translateY(40px); }
    	100% { -webkit-transform: translateY(0); }
    }
    @-moz-keyframes comein {
    	0% { opacity: 0; -moz-transform: translateY(-3000px); }
    	80% { opacity: 1; -moz-transform: translateY(40px); }
    	100% { -moz-transform: translateY(0); }
    }
    @keyframes comein {
    	0% { opacity: 0; transform: translateY(-3000px); }
    	80% { opacity: 1; transform: translateY(40px); }
    	100% { transform: translateY(0); }
    }
    </style>

  </head>
  <body>
    <?php
        $multimedia =URL::asset($pieza->fotografia);
        if (!is_null($ficha->multimedia)) {
          $multimedia=URL::asset($ficha->multimedia);
        }

        ?>
    <div class="row fullscreen">
      <div id="all" class="col m12 ">
        <div id="navi"></div>
        <div id="allcontent">
            <div id="maincontent">

                <div class="portfolio">
                    <img src="{{URL::asset($pieza->fotografia)}}" alt="Portfolio img" style="" class="materialboxed"><br>
                    <div class="txt">Poster . Laperquisa Cinema . <a href="http://cargocollective.com/gomboli/Laperquisa-Cinema-Screening-Posters" target="_blank" title="see more">see more</a>.</div>
                    <div class="ombra"></div>
                </div>
                <div class="portfolio">
                    <img src="http://www.claudiogomboli.com/lab/gallery/imgs/web01.jpg" alt="Portfolio img"  class="materialboxed"><br>
                    <span class="txt">Alfa Romeo <a href="http://www.alfaromeo.com/carconfigurator/IT/159/index.html" target="_blank" title="Alfa Romeo">Car Configurator</a> . <a href="http://wedoo.it" target="_blank" title="WEDOO">@Wedoo</a>.</span>
                    <div class="ombra"></div>
                </div>
                <div class="portfolio">
                    <img src="http://www.claudiogomboli.com/lab/gallery/imgs/illu01.jpg" alt="Portfolio img"  class="materialboxed"><br>
                    <span class="txt">Mac Book Air . Keynote Illustration</span>
                    <div class="ombra"></div>
                </div>
                <div class="portfolio">
                    <img src="http://www.claudiogomboli.com/lab/gallery/imgs/web01.jpg" alt="Portfolio img"><br>
                    <span class="txt">Alfa Romeo <a href="http://www.alfaromeo.com/carconfigurator/IT/159/index.html" target="_blank" title="Alfa Romeo">Car Configurator</a> . <a href="http://wedoo.it" target="_blank" title="WEDOO">@Wedoo</a>.</span>
                    <div class="ombra"></div>
                </div>
            </div>

      </div>
    </div>


  </body>

  <script type="text/javascript">
  $('.portfolio').each(function(index)
  {
      $(this).attr('id', 'img' + (index + 1));
  });

  $('.portfolio').each(function(){
    $('#navi').append('<div class="circle"></div>');
  });

  $('.circle').each(function(index)
  {
      $(this).attr('id', 'circle' + (index + 1));
  });

  $('.portfolio').click(function(){
  if($(this).hasClass('opened')){
      $(this).removeClass('opened');
      $(".portfolio").fadeIn("fast");
      $(this).find('.ombra').fadeOut();
      $("#navi div").removeClass("activenav");
  }
  else{
  	var indexi = $("#maincontent .portfolio").index(this) + 1;
      $(this).addClass('opened');
      $(".portfolio").not(this).fadeOut("fast");
      $(this).find('.ombra').fadeIn();
      $("#circle" + indexi).addClass('activenav');
  }
  });

  //navi buttons
  $("#navi div").click(function() {
  if($(this).hasClass("activenav")){
  	return false;
  }

  	$("#navi div").removeClass("activenav");
  	$(".portfolio").removeClass('opened');
  	$(".portfolio").show();
          $('.ombra').hide();

  	var index = $("#navi div").index(this) + 1;
  	$("#img" + index).addClass('opened');
      $(".portfolio").not("#img" + index).fadeOut("fast");
      $("#img" + index).find('.ombra').fadeIn();

      $(this).addClass("activenav");
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
     $('.materialboxed').materialbox();
   });    
  </script>
</html>
