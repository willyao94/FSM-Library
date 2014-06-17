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
            <span>Language: </span>
            <select class="form-control" name="Language">
              <option value="">Language - All</option>
              <option value="English">English</option>
              <option value="Spanish">Spanish</option>
              <option value="French">French</option>
              <option value="Chinese">Chinese</option>
              <option value="Japanese">Japanese</option>
            </select>
          </div>
          <div class="col-xs-4 form-inline">
            <span>Audience: </span>
            <select class="form-control" name="Audience">
              <option value="">Audience - All</option>
              <option value="Adult">Adult</option>
              <option value="Children">Children</option>
              <option value="Young Adult">Young Adult</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">
            <!-- <span>Available At: </span> -->
            <span>Availability:</span>
            <select class="form-control" name="Availability">
              <option value="">Availability - All</option>
              <option value="In Library">In Library</option>
<!--               <option value="rmd">Richmond</option>
              <option value="van">Vancouver</option> -->
            </select>
          </div>
          <div class="col-xs-4 form-inline">
            <span>Format: </span>
            <select class="form-control" name="Format">
              <option value="">Format - Any</option>
              <option value="Audiobook">Audio Book</option>
              <option value="Book">Book</option>
              <option value="Large Print">Large Print</option>
              <option value="DVD">DVD</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row" style="padding-top:10px">
        <div class="col-xs-3">
          <span align="right"><b>Genre:</b></span>
        </div>
        <div class="col-xs-3">
          <div class="checkbox" align="left">
            <p><input type="checkbox" value="Animals" name="Animals">Animals</input></p>
            <p><input type="checkbox" value="Adventure" name="Adventure">Adventure</input></p>
            <p><input type="checkbox" value="Classics" name="Classics">Classics</input></p>
            <p><input type="checkbox" value="Contemporary" name="Contemporary" >Comtemporary</input></p>
            <p><input type="checkbox" value="Crime" name="Crime">Crime</input></p>
            <p><input type="checkbox" value="Drama" name="Drama">Drama</input></p>
            <p><input type="checkbox" value="Family" name="Family">Family</input></p>
            <p><input type="checkbox" value="Fantasy" name="Fantasy">Fantasy</input></p>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="checkbox" align="left">
            <p><input type="checkbox" value="Historical" name="Historical">Historical</input></p>
            <p><input type="checkbox" value="Horror" name="Horror">Horror</input></p>
            <p><input type="checkbox" value="Humour" name="Humour">Humour</input></p>
            <p><input type="checkbox" value="Law" name="Law">Law</input></p>
            <p><input type="checkbox" value="Military" name="Military">Military</input></p>
            <p><input type="checkbox" value="Mystery" name="Mystery">Mystery</input></p>
            <p><input type="checkbox" value="Non-Fiction" name="Non-Fiction">Non-Fiction</input></p>
            <p><input type="checkbox" value="Paranormal" name="Paranormal">Paranormal</input></p>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="checkbox" align="left">
            <p><input type="checkbox" value="Romance" name="Romance">Romance</input></p>
            <p><input type="checkbox" value="Science-Fiction" name="Science-Fiction">Science-Fiction</input></p>
            <p><input type="checkbox" value="Suspense" name="Suspense">Suspense</input></p>
            <p><input type="checkbox" value="Thriller" name="Thriller">Thriller</input></p>
            <p><input type="checkbox" value="War" name="War">War</input></p>
          </div>
        </div>
      </div>

    </form>

    </div>
  </div><!-- /.container -->


  <script s:rc="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="./JS/offcanvas.js"></script> 
</body>
</html>
