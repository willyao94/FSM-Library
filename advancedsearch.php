<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
  }
  $_SESSION['CurrentPage'] = "advancedsearch.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Advanced Search</title>

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

    <div class="container shrink-box" style="text-align: center">
      <div class="starter-template">
         <h1>Search Options</h1>

        <div class="input-group">
          <input type="text" class="form-control" name="SearchBox" placeholder="Search for titles, authors, or publishers.." />
          <form action="catalogue.php" class="input-group-btn">
            <button type="submit" class="btn btn-success" name="SubmitSearch"><span class="glyphicon glyphicon-search"></button>
          </form>
        </div>
        <br/>
        <div class="navbar-collapse" align="left">
          <b>Limit my search results</b>
        </div>
        <div style="text-align:left">
          <div class="row">
            <div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">
              <span>Lanuage: </span>
              <select class="form-control select-mini" name="Lanugage">
                <option value="all">Language - All</option>
                <option value="eng">English</option>
                <option value="chn">Chinese</option>
                <option value="frn">French</option>
                <option value="jpn">Japanese</option>
              </select>
            </div>
            <div class="col-xs-4 form-inline">
              <span>Audience: </span>
              <select class="form-control select-mini" name="Audience">
                <option value="all">Audience - All</option>
                <option value="adult">Adult</option>
                <option value="child">Children</option>
                <option value="teen">Young Adult</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">
              <span>Available At: </span>
              <select class="form-control select-mini" name="Availability">
                <option value="all">Availability - All</option>
                <option value="bby">Burnaby</option>
                <option value="rmd">Richmond</option>
                <option value="van">Vancouver</option>
              </select>
            </div>
            <div class="col-xs-4 form-inline">
              <span>Year Published:</span>
              <input type="text" class="form-control" placeholder="YYYY" name="Year"/>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top:10px">
          <div class="col-xs-3">
            <div class="checkbox" style="float:left">
              <input type="checkbox" value"">
                Option 1
              </input>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="checkbox">
              <input type="checkbox" value"">
                Option 3
              </input>
            </div>
          </div>
          <div class="col-xs-3">
            Test
          </div>
          <div class="col-xs-3">
            Test
          </div>
        </div>
      </div>
    </div><!-- /.container -->


    <script s:rc="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./JS/offcanvas.js"></script> 
	</body>
</html>
