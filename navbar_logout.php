<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    ini_set('session.save_path', '/home/v/v6l8/public_html/tmp');
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
      <div class="navbar-form navbar-right" role="form">
        <!-- <form action="catalogue.php" method=post/get? -->
        <input type="text" class="form-control" placeholder="Search..." />
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
        <!-- </form> end of searchbar form-->
        <!-- logout button -->
        <form class="btn-group" action="navbar_logout.php" method="POST">
          <button type="submit" class="btn btn-success btn-sm" name="SubmitLogout">Logout</button>
        </form>
      </div>
    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->
