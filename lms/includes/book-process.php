<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$addnum = $_POST['addnum'];
		$addtitle = $_POST['addtitle'];
		$addentrydate = $_POST['addentrydate'];
		$addtypeid = $_POST['addtypeid'];
		$addyear = $_POST['addyear'];
		$addcall = $_POST['addcall'];
		$addnumpages = $_POST['addnumpages'];
		$addheight = $_POST['addheight'];
		$addremarks = $_POST['addremarks'];
		$addcopyright = $_POST['addcopyright'];
		$addpubid = $_POST['addpubid'];
		$addshelfid = $_POST['addshelfid'];

		$add_qry = "INSERT INTO book VALUES (
		'$addnum', 
		'$addtitle', 
		'$addentrydate', 
		'$addtypeid', 
		'$addyear', 
		'$addcall', 
		'$addnumpages', 
		'$addheight', 
		'$addremarks', 
		'$addcopyright', 
		'$addpubid', 
		'$addshelfid')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE book SET 
		Bk_Num = '$_POST[num]', 
		Bk_Title = '$_POST[title]', 
		Bk_Entrydate = '$_POST[entrydate]', 
		BkTypeID = '$_POST[typeid]', 
		Bk_Year = '$_POST[year]', 
		Bk_CallNum = '$_POST[callnum]', 
	 	Bk_NumPages = '$_POST[numpages]', 
		Bk_Height = '$_POST[height]', 
		Bk_Remarks = '$_POST[remarks]', 
		Bk_CpyRightdate = '$_POST[copyright]', 
		Publisher_ID = '$_POST[pubid]', 
		ShelfID = '$_POST[shelfid]'  
		WHERE Bk_Num = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM book 
		WHERE Bk_Num = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editbook.php");
?>