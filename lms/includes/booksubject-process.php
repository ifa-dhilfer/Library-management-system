<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST['add'])){
		$Subject_ID = $_POST[Subject_ID];
		$Bk_Num = $_POST[Bk_Num];
		

		$add_qry = "INSERT INTO booksubject VALUES ('$Subject_ID', '$Bk_Num')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST['update'])){
		$update_qry = "UPDATE booksubject SET Subject_ID = '$_POST[subID]', Bk_Num = '$_POST[bknum]'  WHERE Subject_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST['delete'])){
		$delete_qry = "DELETE FROM booksubject WHERE Subject_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editbooksubject.php");
?>