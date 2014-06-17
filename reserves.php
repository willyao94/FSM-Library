<?php
//   // For PHP < 5.4.0
if(session_id() == ''){
  // For PHP >= 5.40
  //if (session_status() == PHP_SESSION_NONE) {
	session_set_cookie_params(0);
	require 'config.php';
	session_start();
}
$_SESSION['CurrentPage'] = "reserves.php";
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

</head>

<body>
</body>
</html>

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

// if (!$day || !$month || !$branch || !$roomNum) {
// 	header("Location: room.php");
// }

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