<?php
  // For PHP < 5.4.0
  if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    require 'config.php';
    session_start();
  }
  $_SESSION['CurrentPage'] = "contact.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact Us</title>

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
        <h1>Contact Us</h1>
        <p class="lead">FSML has over 15 branches all over Vancouver, Richmond and Burnaby.
          <br> Find one of our branches from the list below and come visit us!</p>

        <?php
          include 'sql_query.php';

          function printResult($result) { //prints results from a select statement
            echo "<table>";
            echo "<tr><th>Name</th><th>Phone</th><th>Fax</th><th>Email</th><th>Address</th><th>Supervisor</th><th>Supervisor Contact</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["BNAME"] . "</td><td>" . $row["PHONE"] . "</td><td>" . $row["FAX"] . "</td><td>" . $row["BEMAIL"]  
                  . "</td><td>" . $row["ADDRESS"] . "</td><td>" . $row["ENAME"] . "</td><td>" . $row["EEMAIL"] . "</td></tr>";
            }
           echo "</table>";
         }

         $result = executePlainSQL("select B.name as bname, B.phone, B.fax, B.email as bemail, B.address, E.name as ename, E.email as eemail
                                      from LibraryBranch B, Employee_WorksAt E
                                      where B.eidSupervisor = E.eid");
          printResult($result); 
       ?>

      </div>

    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./JS/offcanvas.js"></script> 
  </body>
</html>
