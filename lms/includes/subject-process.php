<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST['add'])){
		$Subject_ID = $_POST[Subject_ID];
		$Subject_Desc = $_POST[Subject_Desc];

		$add_qry = "INSERT INTO subject VALUES ('$Subject_ID', '$Subject_Desc')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST['update'])){
		$update_qry = "UPDATE subject SET Subject_ID = '$_POST[subID]', Subject_Desc = '$_POST[subdesc]'  WHERE Subject_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST['delete'])){
		$delete_qry = "DELETE FROM subject WHERE Subject_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editsubject.php");
?>