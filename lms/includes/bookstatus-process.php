<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$type = $_POST['newid'];
		$desc = $_POST['newdesc'];

		$add_qry = "INSERT INTO bookstatus VALUES ('$type', '$desc')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE bookstatus SET Status_ID = '$_POST[id]', Status_Desc = '$_POST[desc]'  WHERE Status_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM bookstatus WHERE Status_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editbook_status.php");
?>