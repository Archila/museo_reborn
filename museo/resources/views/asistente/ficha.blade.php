<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ficha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <style>
    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
    @import url(https://fonts.googleapis.com/css?family=Lato:300|Oswald);
    .slides {
      position: relative;
    }
    .slides .slide {
      position: absolute;
      top: 0;
      width: calc(33% - 1em);
      max-height: 3.5em;
      margin: 0.5em;
      padding: 1em;
      background: #ad1f36;
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
      color: #ec93a2;
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
      background: #e05269;
      font-family: 'Lato', sans-serif;
      font-size: 2em;
      line-height: 1.5;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    h1 {
      margin: 0;
      padding: 1em;
      font-family: 'Oswald', sans-serif;
      font-size: 2em;
      text-transform: uppercase;
      text-align: center;
      color: white;
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
          <h1>Slidin' Slidey Things</h1>
          <div class="slides">
            <div class="slide">
              <a href="#">The Lorem</a>
              <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi rem ab voluptate provident voluptatum veniam cupiditate beatae expedita veritatis aliquid officia doloribus dolore maiores doloremque mollitia! A ducimus autem ut!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus obcaecati velit autem tenetur doloribus perferendis esse odit animi quasi deserunt recusandae perspiciatis a sapiente aliquam qui libero dolor officiis assumenda.
              </div>
            </div>

            <div class="slide">
              <a href="#">The Ipsum</a>
              <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi rem ab voluptate provident voluptatum veniam cupiditate beatae expedita veritatis aliquid officia doloribus dolore maiores doloremque mollitia! A ducimus autem ut!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse harum eius voluptas dicta. Vero tempore rerum itaque? Quidem nobis vel consectetur sit amet illo dicta veniam ab ut libero officia!
              </div>
            </div>

            <div class="slide">
              <a href="#">The Dolor Sit Amet</a>
              <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi rem ab voluptate provident voluptatum veniam cupiditate beatae expedita veritatis aliquid officia doloribus dolore maiores doloremque mollitia! A ducimus autem ut!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim fugiat officiis repellat reprehenderit incidunt deserunt illum eum ipsa quod nihil eligendi hic delectus quaerat. Ad sint tempore cumque mollitia reiciendis!
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
