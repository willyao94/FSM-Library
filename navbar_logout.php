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
      <a class="navbar-brand" href="home.php">FSM Library</a>
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
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <?php 
              include 'sql_query.php';
              if($_SESSION['isEmployee']){
                echo "Hi";
              } else if(isset($_SESSION['CurrentUser'])){
                $result = executePlainSQL("select name from Patron where cardNum=".$_SESSION['CurrentUser']);
                $name;
                while($row = OCI_FETCH_ARRAY($result, OCI_BOTH)){
                  $name = $row["NAME"];
                }
                $pos = strrpos($name, " ");
                $name = substr($name,0,$pos);
                echo "Hi, ".$name;
              }
            ?>
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu" style="width:auto">
            <li><a role="menuitem" tabindex="-1" href="account.php">My Account</a></li>
            <li style="padding-left:20px">
              <form action="navbar_logout.php" method="post">
                <button type="submit" class="btn btn-success btn-sm" name="SubmitLogout">Logout</button>
              </form>
            </li>
          </ul>
        </div>

        <div class="col-sm-2 col-md-2 navbar-right">
          <form action="catalogue.php" method="get">
            <div class=input-group>
              <input type="text" class="form-control" placeholder="Search..." style="width:150px"/>
              <div class="input-group-btn">
                <button type="submit" class="btn btn-success" name="keyword"><span class="glyphicon glyphicon-search"></span></button>
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
