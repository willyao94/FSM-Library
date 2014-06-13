<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
  }
  $_SESSION['CurrentPage'] = "about.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>About Us</title>

    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./CSS/offcanvas.css" rel="stylesheet">
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

    <div class="container" style="text-align: center">

      <div class="starter-template">
        <h1>About Us</h1>
        <p class="lead">
            Welcome to Flying Sea Monkeys Library! Funded by well no one, Flying Sea Monkeys Library is dedicated to meeting the lifelong learning, reading and information needs of Vancouver, Richmond and Burnaby residents for more than (not that many) years. Our vision is an informed, engaged, and connected resource network. Our mission is a free place for everyone to discover, create and share ideas and information. Last year, we did not exist! But FSML had more than 20 visits with patrons borrowing nearly 30 items including: books, ebooks, CDs, DVDs and magazines since then. Across 20 locations, FSML serves nearly 51 active members and is the 10000th largest public library system in Canada.</p>
      </div>

    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./JS/offcanvas.js"></script> 
	</body>
</html>
