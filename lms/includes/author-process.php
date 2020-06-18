<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$id = $_POST['newid'];
		$fname = $_POST['newfname'];
		$lname = $_POST['newlname'];
		$initial = $_POST['newinitial'];

		$add_qry = "INSERT INTO author VALUES ('$id', '$fname', '$lname', '$initial')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE author SET Author_ID = '$_POST[id]', Author_FName = '$_POST[fname]', Author_LName = '$_POST[lname]', Author_Initial = '$_POST[initial]'  WHERE Author_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM author WHERE Author_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editauthor.php");
?>