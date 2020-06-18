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

		$add_qry = "INSERT INTO booktype VALUES ('$type', '$desc')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE booktype SET BkTypeID = '$_POST[id]', BkType_Desc = '$_POST[desc]'  WHERE BkTypeID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM booktype WHERE BkTypeID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editbk_type.php");
?>