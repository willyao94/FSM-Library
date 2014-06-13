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

       <form action="catalogue.php" method="get">

      <div class="input-group">
        <input type="text" class="form-control" name="SearchBox" placeholder="Search for titles, authors, or publishers.." />
        <div class="input-group-btn">
          <button type="submit" class="btn btn-success" name="SubmitSearch"><span class="glyphicon glyphicon-search"></button>
        </div>
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
            <span>Format: </span>
            <select class="form-control select-mini" name="Format">
              <option value="all">Format - Any</option>
              <option value="adb">Audio Book</option>
              <option value="bk">Book</option>
              <option value="dvd">DVD</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row" style="padding-top:10px">
        <div class="col-xs-3">
          <span align="right"><b>Format:</b></span>
        </div>
        <div class="col-xs-3">
          <div class="checkbox" align="left">
            <p><input type="checkbox" value"animal">Animals</input></p>
            <p><input type="checkbox" value"adventure">Adventure</input></p>
            <p><input type="checkbox" value"classic">Classics</input></p>
            <p><input type="checkbox" value"comtemp">Comtemporary</input></p>
            <p><input type="checkbox" value"crime">Crime</input></p>
            <p><input type="checkbox" value"drama">Drama</input></p>
            <p><input type="checkbox" value"family">Family</input></p>
            <p><input type="checkbox" value"fantasy">Fantasy</input></p>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="checkbox" align="left">
            <p><input type="checkbox" value="fiction">Fiction</input></p>
            <p><input type="checkbox" value="history">Historical</input></p>
            <p><input type="checkbox" value="horror">Horror</input></p>
            <p><input type="checkbox" value="humour">Humour</input></p>
            <p><input type="checkbox" value="law">Law</input></p>
            <p><input type="checkbox" value="military">Military</input></p>
            <p><input type="checkbox" value="mystery">Mystery</input></p>
            <p><input type="checkbox" value="nonfic">Non Fiction</input></p>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="checkbox" align="left">
            <p><input type="checkbox" value="paranormal">Paranormal</input></p>
            <p><input type="checkbox" value="romance">Romance</input></p>
            <p><input type="checkbox" value="science">Science</input></p>
            <p><input type="checkbox" value="suspence">Suspence</input></p>
            <p><input type="checkbox" value="thriller">Thriller</input></p>
            <p><input type="checkbox" value="war">War</input></p>
          </div>
        </div>
      </div>

    </form>

    </div>
  </div><!-- /.container -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="./JS/offcanvas.js"></script> 
</body>
</html>
