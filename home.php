<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
  }
  $_SESSION['CurrentPage'] = "home.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./CSS/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <!-- Load the navbar -->
    <?php
      if(!isset($_SESSION['CurrentUser'])){
	include 'navbar_login.php';
      } else {
	include 'navbar_logout.php';
      }
    ?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="itemdisplay.php" class="list-group-item">Item Display Testing</a>
            <a href="#" class="list-group-item">Thing 2</a>
            <a href="#" class="list-group-item">Thing 3</a>
            <a href="#" class="list-group-item">Thing 4</a>
            <a href="#" class="list-group-item">Thing 5</a>
            <a href="#" class="list-group-item">Thing 6</a>
            <a href="#" class="list-group-item">Thing 7</a>
            <a href="#" class="list-group-item">Thing 8</a>
            <a href="#" class="list-group-item">Thing 9</a>
            <a href="#" class="list-group-item">Thing 10</a>
          </div>
        </div><!--/span-->

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
            <!-- Carousel ================================================== -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1" class=""></li>
              <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="http://jasny.github.com/bootstrap/2.3.1/assets/img/bootstrap-mdo-sfmoma-01.jpg">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com/examples/carousel/#" role="button">Sign up today</a></p> -->
                  </div>
                </div>
              </div>
              <div class="item">
                <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="http://jasny.github.com/bootstrap/2.3.1/assets/img/bootstrap-mdo-sfmoma-02.jpg"3>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com/examples/carousel/#" role="button">Learn more</a></p> -->
                  </div>
                </div>
              </div>
              <div class="item">
                <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="http://jasny.github.com/bootstrap/2.3.1/assets/img/bootstrap-mdo-sfmoma-03.jpg">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com/examples/carousel/#" role="button">Browse gallery</a></p> -->
                  </div>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div><!-- /.carousel -->
          
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->

      </div><!--/row-->

      <!-- line at bottom -->
      <!--<hr></hr>-->
      <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>

    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./JS/offcanvas.js"></script> 
  </body>
</html>
