<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
    header("Location: home.php");
  }
  if(isset($_POST['SubmitLogout'])){
    if(isset($_SESSION['CurrentUser'])){
      session_destroy();
      header("Location: ".$_SESSION['CurrentPage']);
    }
  }
?>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Library</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!-- Link to about page -->
        <li><a href="about.php">About Us</a></li>
        <!-- Link to contact us page -->
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <div class="navbar-form" role="form">
        <div class="row">

        <div class="col-sm-2 col-md-2 navbar-right">
          <form class="btn-group" action="navbar_logout.php" method="POST">
            <button type="submit" class="btn btn-success" name="SubmitLogout">Logout</button>
          </form>
        </div>

        <div class="col-sm-2 col-md-2 navbar-right">
          <form action="catalogue.php" method="get">
            <div class=input-group>
              <input type="text" class="form-control" placeholder="Search..." style="width:150px"/>
              <div class="input-group-btn">
                <button type="submit" class="btn btn-success" name="SubmitSearch"><span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
          </form><!-- end of searchbar form -->
          <div><a href="advancedsearch.php"><small>Advanced Search</small></a></div>
        </div>
        
        </div>

      </div>
    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->
