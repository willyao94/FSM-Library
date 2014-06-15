<?php	
	// For PHP < 5.4.0
	if (session_id() == ''){
	// For PHP >= 5.40
	// if (session_status() == PHP_SESSION_NONE) {
   		session_set_cookie_params(0);
    	require 'config.php';
    	session_start();
    	header("Location: home.php");
  }

	$success = True; //keep track of errors so it redirects the page only if there are no errors
	$db_conn = OCILogon("ora_k0q8", "a39122122", "ug");


function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
		echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
		$e = OCI_Error($db_conn); // For OCIParse errors pass the       
		echo htmlentities($e['message']);
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);
	if (!$r) {
		echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
		$e = oci_error($statement); // For OCIExecute errors pass the statementhandle
		echo htmlentities($e['message']);
		$success = False;
	} else {

	}
	return $statement;

}

function executeBoundSQL($cmdstr, $list) { //takes in bound variable SQL command and executes it
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr);
	if (!$statement) {
		echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
		$e = OCI_Error($db_conn);
		echo htmlentities($e['message']);
		$success = False;
	}
	foreach ($list as $tuple) {
		foreach ($tuple as $bind => $val) {
			OCIBindByName($statement, $bind, $val);
			//make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
			unset ($val);
		}
		$r = OCIExecute($statement, OCI_DEFAULT);
		if (!$r) {
			echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
			$e = OCI_Error($statement); // For OCIExecute errors pass the statementhandle
			echo htmlentities($e['message']);
			echo "<br>";
			$success = False;
		}
	}
	return $statement;
}

?>
