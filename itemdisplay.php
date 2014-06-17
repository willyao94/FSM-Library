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

    <!-- NOTE: should be title of selected LibraryMaterial -->
    <title>Title</title>

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

        <!-- NOTE: should be title of selected LibraryMaterial -->
        <br/>
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
            <p><b>Place Hold</b></p>
            <hr></hr>
            <!-- NOTE: following 3 lines should be dynamic-->
            <p>Total Copies: <?php ?></p>
            <p>Available: <?php ?></p>
            <p>Holds: <?php ?></p>
            <form method="get">
              <button type="submit" class="btn btn-success" name="PlaceHold">Place Hold</button>
              <p style="padding-top:10px">On the shelves now at</p>
              <!-- NOTE: this should be dynamic-->
              <div class="col-xs-1 col-xs-offset-1">
                <select class="form-control" name="Location" style="width:200px">
                  <option value="Britannia" name="Britannia">Britannia</option>
                  <option value="Central" name="Central">Central</option>
                  <option value="Kensington" name="Kensington">Kensington</option>
                  <option value="HamiltonLibraryService" name="HamiltonLibraryService">Hamilton Library Service</option>
                </select>
              </div>
            </form>
          </div>
          <div class="col-xs-12 col-sm-9"> 
            <div class="col-xs-6">
              <!-- NOTE: this should be dynamic -->
              <img src="http://i.imgur.com/qorxj8v.jpg"></img>
            </div>
            <div class="col-xs-4" align="left">
              <!-- NOTE: All theses should be dynamic -->
              <p>Ttile</p>
              <p>Author</p> <!-- maybe have this as a link to search other material by this author -->
              <p>Type</p>
              <p>Genres</p>
              <p>Publisher</p><!-- same as author -->
              <p>Year</p><!-- combine this with one above? -->
              <p>Language</p>
              <p>Rating</p>
              <p>ISBN</p>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./JS/offcanvas.js"></script> 
  </body>
</html>
