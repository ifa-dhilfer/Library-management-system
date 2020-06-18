<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){

		$bkanum = $_POST['newbkan'];
		$bkentdte = $_POST['newbked'];
		$bkcprice = $_POST['newbkcp'];
		$bknumb = $_POST['newbkn'];
		$staid = $_POST['newstatid'];
		$invnumb = $_POST['newinnum'];

		$add_qry = "INSERT INTO bookcopy VALUES ('$bkanum', '$bkentdte', '$bkcprice','$bknumb','$staid','$invnumb')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE bookcopy SET 
		Bk_AccessionNum = '$_POST[bkan]', 
		BkCpy_EntryDate = '$_POST[bked]', 
		Bk_Cpy_Price = '$_POST[bkcp]',
		Bk_Num = '$_POST[bkn]',
		Status_ID = '$_POST[statid]',
		Inv_Num = '$_POST[innum]' 
		WHERE Bk_AccessionNum = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM bookcopy WHERE Bk_AccessionNum = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editbkcopy.php");
?>