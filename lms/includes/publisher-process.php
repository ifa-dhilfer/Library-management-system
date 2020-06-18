<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST['add'])){
		$Publisher_ID = $_POST['Publisher_ID'];
		$Publisher_Name = $_POST['Publisher_Name'];
		$Publisher_City = $_POST['Publisher_City'];
		$Publisher_Country = $_POST['Publisher_Country'];
		$Publisher_Addr = $_POST['Publisher_Addr'];
		
		

		$add_qry = "INSERT INTO publisher VALUES ('$Publisher_ID', '$Publisher_Name','$Publisher_City','$Publisher_Country','$Publisher_Addr')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST['update'])){
		$update_qry = "UPDATE publisher SET Publisher_ID = '$_POST[pubID]', Publisher_Name = '$_POST[pubname]',Publisher_City = '$_POST[pubcity]', Publisher_Country = '$_POST[pubcountry]',Publisher_Addr = '$_POST[pubaddr]'  WHERE Publisher_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST['delete'])){
		$delete_qry = "DELETE FROM publisher WHERE Publisher_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../publisher.php");
?>