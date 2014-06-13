<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
    if(!isset($_SESSION['CurrentUser'])){
      header("Location: home.php");
    } else {
      header("Location: ".$_SESSION['CurrentPage']);
    }
  }

  include 'sql_query.php';

  if(array_key_exists('SubmitLogin',$_POST)){

    // Connect to Oracle...
   if ($db_conn) {

    $userName = $_POST['UserNameInput'];
    $passWord = $_POST['PasswordInput'];
    // Update tuple using data from user
    $tuple = array (
      ":bind1" => $userName,
      ":bind2" => $passWord
    );
    $alltuples = array ($tuple);

    $result;
    $isEmployee = false;

    if (strlen($userName) == 9) {
        $result = executeBoundSQL("select * from patron where cardNum=:bind1 and pin=:bind2", $alltuples);
    } else {
        $result = executeBoundSQL("select * from employee_worksat where eid=:bind1 and password=:bind2", $alltuples);
        $isEmployee = true;
    }

    $success_login = false;

    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
      $success_login = true;
    }

    if ($success_login == true) {
      $_SESSION['CurrentUser'] = $userName;
      if ($isEmployee == true)
        $_SESSION['isEmployee'] = true;
      header("Location: ".$_SESSION['CurrentPage']);
      exit();
    }

    //Commit to save changes...
    OCILogoff($db_conn);
  } else {
    $e = OCI_Error(); // For OCILogon errors pass no handle
    echo htmlentities($e['message']);
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
      <div class="navbar-form navbar-right" role="form">
        <input type="text" class="form-control" placeholder="Search..." />
        <form class="btn-group" action="catalogue.php" method="post">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
        </form><!-- end of searchbar form -->
        <form class="btn-group" action="navbar_login.php" method="post">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            Login <span class="caret"></span>
          </button>
          <div class="dropdown-menu" >
            <div class="col-sm-12">
              <div class="col-sm-12">
                <b>Login</b>
              </div>
              <div class="col-sm-12">
                <input type="text" name="UserNameInput" placeholder="Library ID" class="form-control input-sm" id="inputError" />
              </div>
              <br/>
              <div class="col-sm-12">
                <input type="password" name="PasswordInput" placeholder="PIN" class="form-control input-sm" />
              </div>
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success btn-sm" name="SubmitLogin">Sign in</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->