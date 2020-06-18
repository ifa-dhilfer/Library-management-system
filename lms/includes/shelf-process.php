<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$id = $_POST['newid'];
		$desc = $_POST['newdesc'];

		$add_qry = "INSERT INTO shelf VALUES ('$id', '$desc')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE shelf SET ShelfID = '$_POST[id]', ShelfDesc = '$_POST[desc]'  WHERE ShelfID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM shelf WHERE ShelfID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editshelf.php");
?>