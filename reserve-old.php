<?php
  // For PHP < 5.4.0
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
    include 'sql_query.php';

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



// use as reference:
    echo 'BID: ' . $branch . ', Room #: ' . $roomNum . ', Month: ' . $month . ', Day: ' . $day . '<br/>';
    $result = executePlainSQL("select bid, name from librarybranch");

    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
      echo 'BID:' . $row["BID"] . ', Name: ' . $row["NAME"] . '<br/>';
    }

    ?>

    <div class="container" style="text-align: center">

      <div class="starter-template">
       <h1>Reserve a Room</h1>
       <h2>for Room <?php echo $roomNum; ?> at 
         <?php 
         echo $branch; ?><br/>on 
         <?php 
         $dateObj = DateTime::createFromFormat('!m', $month); 
         $monthName = $dateObj->format('F'); 
         echo $monthName . ' ' . $day . '<br/>'; ?></h2>
         <p class="lead">

          <!-- <form action="reserve.php" method="post">

           <div class="input-group">
            <div class="input-group-btn">
            </div>
          </div>
          <br/><br/> -->



          <!-- <div class="row">

            <div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">

              <div align="left" class="input-group">
                <span>Enter your library card number: </span>
                <input type="text" class="form-control" name="EventName" required />
              </div>
              <br/>
              <div align="left" class="input-group">
                <span>Enter a short description of what you will be using the room for: </span>
                <input type="text" class="form-control" name="EventName" placeholder="E.g. Study Time" />
                <button type="submit" class="btn btn-success" name="EventName">Submit</button>
              </div>
              <br/>
            </div>

            <div align="left" class="col-xs-4 form-inline" style="padding-bottom:15px">
             <span>Start Time: </span>
             <select class="form-control select-mini" name="selectHourAndMinute"> -->
              

                <!-- // use as reference:
                // echo 'BID: ' . $branch . ', Room #: ' . $roomNum . ', Month: ' . $month . ', Day: ' . $day . '<br/>';
                // $result2 = executePlainSQL("select bid, name from librarybranch");



                // while ($row = OCI_Fetch_Array($result2, OCI_BOTH)) {
                //     $begin = (($row["startHour"])*2 - 18) + ($row["startMin"]/30)
                //     $end = (($row["endHour"])*2 - 18) + ($row["endMin"]/30)

                //     echo 'BID:' . $row["BID"] . ', Name: ' . $row["NAME"] . '<br/>'; -->

                
                <!-- <option value=""> Select One </option>
                <option value="0">09:00 AM</option>
                <option value="1">09:30 AM</option>
                <option value="2">10:00 AM</option>
                <option value="3">10:30 AM</option>
                <option value="4">11:00 AM</option>
                <option value="5">11:30 PM</option>
                <option value="6">12:00 PM</option>
                <option value="8">12:30 PM</option>
                <option value="7">01:00 PM</option>
                <option value="8">01:30 PM</option>
                <option value="9">02:00 PM</option>
                <option value="10">02:30 PM</option>
                <option value="11">03:00 PM</option>
                <option value="12">03:30 PM</option>
                <option value="13">04:00 PM</option>
                <option value="14">04:30 PM</option>
                <option value="15">05:00 PM</option>
                <option value="16">05:30 PM</option>
                <option value="17">06:00 PM</option>
                <option value="18">06:30 PM</option>
                <option value="19">07:00 PM</option>
                <option value="20">07:30 PM</option>
                <option value="21">08:00 PM</option>
                <option value="22">08:30 PM</option>
                <option value="23">9:00 PM</option>
              </select>

              <span> for </span>
              <select class="form-control select-mini" name="TimeMinuteFor">
                <option value="" >-- Select One --</option>
                <option value="1">30 minutes</option>
                <option value="2">60 minutes</option>
                <option value="3">90 minutes</option>
                <option value="4">120 minutes</option>
              </select>
            </div> -->

            <!-- <div align="left" class="col-xs-4 form-inline">
             <span>Date: </span>
             <select class="form-control select-mini" name="month">
              <option value="jan">January</option>
              <option value="feb">February</option>
              <option value="mar">March</option>
              <option value="apr">April</option>
              <option value="may">May</option>
              <option value="jun">June</option>
              <option value="jul">July</option>
              <option value="aug">August</option>
              <option value="sep">September</option>
              <option value="oct">October</option>
              <option value="nov">November</option>
              <option value="dec">December</option>
            </select>
            <select class="form-control select-mini" name="day">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div> -->
       <!--  </div> -->

    					<!-- <div class="row">

    						<div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">
    							<span>Room #: </span>
    							<select class="form-control select-mini" name="Availability">
    								<option value="rm1">1</option>
    								<option value="rm2">2</option>
    								<option value="rm3">3</option>
    								<option value="rm4">4</option>
    								<option value="rm5">5</option>
    							</select>
    						</div>

    						<div class="col-xs-4 form-inline">
    							<span>Branch ID: </span>
    							<select class="form-control select-mini" name="Format">
    								<option value="none">-- Select One --</option>
    								<?php
    								// include 'sql_query.php';

    								// $bid = $_POST['BID'];
    								// $roomNum = $_POST['ROOMNUM'];
    								// $month = $_POST['MONTH'];
    								// $day = $_POST['DAY'];


    								// $result = executePlainSQL("select extract(hour from startdatetime) as starthour, extract(minute from startdatetime) as startminute, 
    								// 	extract(hour from enddatetime) as endhour, extract(minute from enddatetime) as endminute 
    								// 	from reserve where roomnum = $roomNum and bid = $bid and month = $month and day = $day;");
    								// while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
    								// 	echo '<option value=' . $_POST["ROOMNUM"] . '>' . $row["ROOMNUM"] . '</option>';
    								// 	echo '<option value=' . $_POST["BID"] . '>' . $row["BID"] . '</option>';

    								}
    								?>
    							</select>
    						</div>

    					</div> -->
    				<!-- </div> -->

    			<!-- </form> -->
    		</div>
    	</div><!-- /.container -->


    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    	<script src="./JS/offcanvas.js"></script> 
    </body>
    </html>