<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$num = $_POST['newnum'];
		$date = $_POST['newdate'];
		$sid = $_POST['newsid'];

		$add_qry = "INSERT INTO loan VALUES ('$num', '$date', '$sid')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE loan SET Loan_Num = '$_POST[num]', Loan_Date = '$_POST[date]', Staff_ID = '$_POST[sid]'  WHERE Loan_Num = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM loan WHERE Loan_Num = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editloan.php");
?>