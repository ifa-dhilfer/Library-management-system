<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$bknumb = $_POST['newbknum'];
		$athident = $_POST['newathid'];
		
		$add_qry = "INSERT INTO bookauthor VALUES ('$bknumb', '$athident')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE bookauthor SET 
		BK_Num = '$_POST[bknum]',  
		Author_ID = '$_POST[athid]'
		 WHERE BK_Num = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM bookauthor WHERE BK_Num = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../bookauthor.php");
?>