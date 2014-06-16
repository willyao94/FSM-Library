<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Account</title>

    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./CSS/offcanvas.css" rel="stylesheet">
    <link href="./CSS/sidebar.css" rel="stylesheet">
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
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" style="padding-left:20%">
            <span>CHECKED OUT</span>
            <p>Total Items</p>
            <p>Next Due</p>
            </br>
            <span>HOLDS</span>
            <p>All Holds</p>
            </br>
            <span>OTHER</span>
            <p>Fines</p>
            <!-- <li><a href="">Overview</a></li>
            <li><a href="">Analytics</a></li>
            <li><a href="">Export</a></li> -->
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_a" data-toggle="tab">Checked Out</a></li>
            <li><a href="#tab_b" data-toggle="tab">Holds</a></li>
            <li><a href="#tab_c" data-toggle="tab">Fines</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_a">
              <h4>Checked Out</h4>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
            <div class="tab-pane" id="tab_b">
              <h4>Holds</h4>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
            <div class="tab-pane" id="tab_c">
              <h4>Fines</h4>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
          </div><!-- tab content -->
        </div>
      </div>
    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./JS/offcanvas.js"></script>
    <script src="./JS/table.js"></script>
	</body>
</html>
