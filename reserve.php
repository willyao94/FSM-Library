<?php
//   // For PHP < 5.4.0
if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
	session_set_cookie_params(0);
	require 'config.php';
	session_start();
}
$_SESSION['CurrentPage'] = "reserve.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Reserve a Room</title>

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
    <br/>

    <?php

    $day = $_POST['day'];
    $month = $_POST['month'];
    $branch = $_POST['bid'];
    $roomNum = $_POST['roomNum'];

    if (!$day || !$month || !$branch || !$roomNum) {
     header("Location: room.php");
   }

                    /*09:00 09:30 10:00 10:30 11:00 11:30 12:00 12:30 01:00 01:30 02:00 02:30*/
   $occupied = array(false,false,false,false,false,false,false,false,false,false,false,false,
                    false,false,false,false,false,false,false,false,false,false,false,false);
                  /*03:00 03:30 04:00 04:30 05:00 05:30 06:00 06:30 07:00 07:30 08:00 08:30*/

   ?>

   <div class="container" style="text-align: center">

    <div class="starter-template">
     <h1>Reserve a Room</h1>
     <h2>Reserve Room <?php echo $roomNum; ?> at 
       <?php 
       include 'sql_query.php';

       $result = executePlainSQL("select name from librarybranch where bid = $branch");
       while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo $row["NAME"];
      }
      ?>
      <br/>on 
      <?php 
      $dateObj = DateTime::createFromFormat('!m', $month); 
      $monthName = $dateObj->format('F'); 
      echo $monthName . ' ' . $day . '<br/>'; ?></h2>

      <p class="lead">

       <div class="container shrink-box" style="text-align: center">
        <div class="starter-template">
         <form action="room.php" method="post">

          <div style="text-align:left">

           <div align="left" class="input-group">

            <input type="hidden" class="form-control" name="bid" value=<?php echo $branch ?> />
            <input type="hidden" class="form-control" name="roomNum" value=<?php echo $roomNum ?> />
            <input type="hidden" class="form-control" name="month" value=<?php echo $month ?> />
            <input type="hidden" class="form-control" name="day" value=<?php echo $day ?> />

            <span>Enter your library card number: </span>
            <input type="text" class="form-control" name="CardNum" />
          </div>
          <br/>
          <div align="left" class="input-group">
            <span>Enter a short description of what you will be using the room for: </span>
            <input type="text" class="form-control" name="EventName" placeholder="E.g. Study Time" />

          </div>
          <br/>

          <div class="row" style="padding-top:10px" style="padding-bottom:0px">
            <div class="col-xs-1">
              <span align="right">Timeslots: </span>
            </div>
            <div class="col-xs-3">
              <div class="checkbox" align="left">


                <?php

                $unavailTimes = executePlainSQL("select extract(month from startdatetime) as ThisMonth, extract(day from startdatetime) as ThisDay, 
                  extract(hour from startdatetime) as StartHour, extract(minute from startdatetime) as StartMinute, 
                  extract(hour from enddatetime) as EndHour, extract(minute from enddatetime) as EndMinute from reserve 
                  where (extract(month from startdatetime) = $month) and (extract(day from startdatetime) = $day)");

                while ($row = OCI_Fetch_Array($unavailTimes, OCI_BOTH)) {

                  $begin = (($row["STARTHOUR"])*2 - 18) + ($row["STARTMINUTE"]/30);
                  $end = (($row["ENDHOUR"])*2 - 18) + ($row["ENDMINUTE"]/30);

                  for ($begin; $begin < $end; $begin++) {
                    $occupied[$begin] = true;
                  }

                }

                for ($i = 0; $i <= 23; $i++) {
                  if ($occupied[$i] == false) {
                    $newHour = floor(($i + 18)/2); 
                    $newMinute = ($i % 2)*30; 
                    if ($newMinute == 0) {
                      $newMinute = sprintf("%02s", $newMinute);
                      $endHour = $newHour;
                      $endMinute = 30;
                                } else { //if ($newMinute == 30) {
                                  $endHour = $newHour + 1;
                                  $endMinute = 0;
                                  $endMinute = sprintf("%02s", $endMinute);
                                }
                                echo '<p><input type="checkbox" value=true name=' . $i . '>' . $newHour . ':' . $newMinute . ' - ' . $endHour . ':' . $endMinute . '</input></p>';
                              }
                            }

                            ?>

                          </div>
                        </div>


                      </div>

                      <br/><br/>
                      <div align="left" class="input-group">
                        <button type="submit" class="btn btn-success" name="reserveSubmitted">Submit</button>
                      </div>
                      <br/><br/>

                    </div>
                  </form>
                </div>
              </div><!-- /.container -->



              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
              <script src="./JS/offcanvas.js"></script> 
            </body>
            </html>