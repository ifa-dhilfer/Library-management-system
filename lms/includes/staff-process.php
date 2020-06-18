<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$sid = $_POST[newstaffid];
		$sfn = $_POST[newstafffn];
		$sln = $_POST[newstaffln];
		$sun = $_POST[newstaffun];
		$spwd = $_POST[newstaffpwd];
		$sacc = $_POST[newstaffacctype];

		$store_password = password_hash($spwd, PASSWORD_DEFAULT);

		$add_qry = "INSERT INTO staff VALUES ('$sid', '$sfn', '$sln', '$sun', '$store_password', '$sacc')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){

		$store_password = password_hash('$_POST[staffpwd]', PASSWORD_DEFAULT);

		$update_qry = "UPDATE staff SET 
		Staff_ID = '$_POST[staffid]', 
		Staff_FName = '$_POST[stafffn]', 
		Staff_LName = '$_POST[staffln]',
		Staff_Username = '$_POST[staffun]', 
		Staff_Pwd = '$store_password',
		Staff_AccountType = '$_POST[staffacctype]'
		 WHERE Staff_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM staff WHERE Staff_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editstaff.php");
?>