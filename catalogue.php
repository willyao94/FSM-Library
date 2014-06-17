<?php
  // For PHP < 5.4.0
if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
  session_set_cookie_params(0);
  require 'config.php';
  session_start();
}
$_SESSION['CurrentPage'] = "catalogue.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Catalogue</title>

  <!-- Bootstrap core CSS -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./CSS/offcanvas.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy this line! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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
          <h1>Search Results</h1>
          <form method="get">
            <!-- Query with search parameters -->
            <?php
            include 'sql_query.php';

      // Use to identify Simple Search
            $keyword = $_GET["keyword"];
      // Any of these to be used for Advanced Search
         // SearchBox + Dropdowns
            $searchbox = $_GET["SearchBox"];
            $language = $_GET["Language"];
            $audience = $_GET["Audience"];
            $status = $_GET["Availability"];
            $type = $_GET["Format"];
         // Checkboxes
            $animals = $_GET["Animals"];
            $adventure = $_GET["Adventure"];
            $classics = $_GET["Classics"];
            $contemporary = $_GET["Contemporary"];
            $crime = $_GET["Crime"];
            $drama = $_GET["Drama"];
            $family = $_GET["Family"];
            $fantasy = $_GET["Fantasy"];
            $historical = $_GET["Historical"];
            $horror = $_GET["Horror"];
            $humour = $_GET["Humour"];
            $law = $_GET["Law"];
            $military = $_GET["Military"];
            $mystery = $_GET["Mystery"];
            $nonfiction = $_GET["Non-Fiction"];
            $paranormal = $_GET["Paranormal"];
            $romance = $_GET["Romance"];
            $sciencefiction = $_GET["Science-Fiction"];
            $suspense = $_GET["Suspense"];
            $thriller = $_GET["Thriller"];
            $war = $_GET["War"];

        // store result of query here
            $result;

            if(isset($keyword)) {
              $result = executePlainSQL("select * from LibraryMaterial LM, Creator_Creates C 
                where (LM.barcode = C.barcode) 
                AND (LOWER(title) LIKE LOWER('%$keyword%') or LOWER(name) LIKE LOWER('%$keyword%') or LOWER(publisher) LIKE LOWER('%$keyword%'))");
            } else {
              $result = executePlainSQL("select * from LibraryMaterial LM, Creator_Creates C
                where (LM.barcode = C.barcode)
                AND (LOWER(title) LIKE LOWER('%$searchbox%') or LOWER(name) LIKE LOWER('%$searchbox%') or LOWER(publisher) LIKE LOWER('%$searchbox%'))

                INTERSECT 

                select * from LibraryMaterial LM, Creator_Creates C
                where (LM.barcode = C.barcode)
                AND (language LIKE '%$language%')

                INTERSECT

                select * from LibraryMaterial LM, Creator_Creates C
                where (LM.barcode = C.barcode)
                AND (audience LIKE '%$audience%')

                INTERSECT

                select * from LibraryMaterial LM, Creator_Creates C
                where (LM.barcode = C.barcode)
                AND (status LIKE '%$status%')

                INTERSECT 

                select * from LibraryMaterial LM, Creator_Creates C
                where (LM.barcode = C.barcode)
                AND (type LIKE '%$type%')

                INTERSECT

                select * from LibraryMaterial LM, Creator_Creates C
                where (LM.barcode = C.barcode)
                AND (genre LIKE '%$animals%' and genre LIKE '%$adventure%' and genre LIKE '%$classics%'
                  and genre LIKE '%$contemporary%' and genre LIKE '%$crime%' and genre LIKE '%$drama%'
                  and genre LIKE '%$family%' and genre LIKE '%$fantasy%' and genre LIKE '%$historical%'
                  and genre LIKE '%$horror%' and genre LIKE '%$humour%' and genre LIKE '%$law%'
                  and genre LIKE '%$military%' and genre LIKE '%$mystery%' and genre LIKE '%$nonfiction%'
                  and genre LIKE '%$paranormal%' and genre LIKE '%$romance%' and genre LIKE '%$sciencefiction%'
                  and genre LIKE '%$suspense%' and genre LIKE '%$thriller%' and genre LIKE '%$war')");
            }

               function printResult($result) { //prints results from a select statement
                echo '<table class="table table-hover">';
                echo '<tr><th style="text-align:center">Image</th><th style="text-align:center">Title</th><th style="text-align:center">Name</th><th style="text-align:center">Rating</th><th style="text-align:center">Type</th><th style="text-align:center">Year</th></tr>';
                // if($db_conn) { echo "is connected";} else{echo"no connection";}
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                 echo "<tr><td>" . "<img src=" . $row["PHOTOLINK"] . 'alt="Unavailable" height="100" width="75">' . 
                 "</td><td>" .'<a href="itemdisplay.php?barcode=' .$row["BARCODE"]. '">'.$row["TITLE"] .'</a>' .
                 "</td><td>" . $row["NAME"] . "</td><td>" . $row["RATING"] . "</td><td>" . $row["TYPE"]  . "</td><td>" . $row["YEAR"] . "</td></tr>";      
               }
               echo "</table>";
             }

             printResult($result);

             ?>
           </form>
         </div>
       </div><!-- /.container -->

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
       <script src="./JS/offcanvas.js"></script> 
     </body>
     </html>
