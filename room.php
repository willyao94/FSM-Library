<?php
//   // For PHP < 5.4.0
if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
	session_set_cookie_params(0);
	require 'config.php';
	session_start();
}
$_SESSION['CurrentPage'] = "room.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Book A Room!</title>

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
  			<h1>Book A Room!</h1>
  			<p class="lead">

  			<form action="reserves.php" method="post">

  					<div class="container shrink-box" style="text-align: center">
  						<div class="starter-template">
  							<form action="reserve.php" method="post">

  								<div style="text-align:left">
  									<div class="row">
  										<div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">
  											<span>Branch: </span>
  											<select class="form-control select-mini" name="bid">
  												<option value="none">-- Select One --</option>
  												<?php
  												include 'sql_query.php';
  												$result = executePlainSQL("select name from librarybranch");
  												while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
  													echo '<option value=' . $row["BID"] . '>' . $row["NAME"] . '</option>';
  												}
  												?>
  											</select>
  										</div>

  										<div class="col-xs-4 form-inline">
  											<span>Date: </span>
  											<select class="form-control select-mini" name="month">
   												<option value="none">-- Select One --</option>
  												<option value="01">January</option>
  												<option value="02">February</option>
  												<option value="03">March</option>
  												<option value="04">April</option>
  												<option value="05">May</option>
  												<option value="06">June</option>
  												<option value="07">July</option>
  												<option value="08">August</option>
  												<option value="09">September</option>
  												<option value="10">October</option>
  												<option value="11">November</option>
  												<option value="12">December</option>
  											</select>
  											<select class="form-control select-mini" name="day">
  											  	<option value="none">-- Select One --</option>
  												<option value="01">1</option>
  												<option value="02">2</option>
  												<option value="03">3</option>
  												<option value="04">4</option>
  												<option value="05">5</option>
  												<option value="06">6</option>
  												<option value="07">7</option>
  												<option value="08">8</option>
  												<option value="09">9</option>
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
  										</div>
  									</div>

  									<div class="row">

  										<div class="col-xs-4 col-xs-offset-2 form-inline" style="padding-bottom:15px">
  											<span>Room #: </span>
  											<select class="form-control select-mini" name="roomNum">
  												<option value="none">-- Select One --</option>
  												<option value="1">1</option>
  												<option value="2">2</option>
  												<option value="3">3</option>
  												<option value="4">4</option>
  												<option value="5">5 (Britannia)</option>
  											</select>
  										</div>

  								<!-- 		<div class="col-xs-4 form-inline">
  											<span></span>
  										</div> -->

  										<div class="input-group">
         									<button type="submit" class="btn btn-success">Book A Room!</button>
     									</div>
  									</div>
  								</div>
  							</form>
  						</div>
  					</div><!-- /.container -->


  					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  					<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  					<script src="./JS/offcanvas.js"></script> 
  				</body>
  				</html>