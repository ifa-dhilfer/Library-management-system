<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST['add'])){
		$Supp_Num = $_POST['Supp_Num'];
		$Supp_Name = $_POST['Supp_Name'];
		$Supp_Phone = $_POST['Supp_Phone'];
		$Supp_Email = $_POST['Supp_Email'];
		$Supp_Fax = $_POST['Supp_Fax'];
		
		

		$add_qry = "INSERT INTO supplier VALUES ('$Supp_Num', '$Supp_Name','$Supp_Phone','$Supp_Email','$Supp_Fax')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST['update'])){
		$update_qry = "UPDATE supplier SET Supp_Num = '$_POST[suppnum]', Supp_Name = '$_POST[suppname]',Supp_Phone = '$_POST[supphone]', Supp_Email = '$_POST[suppemail]',Supp_Fax = '$_POST[suppfax]'  WHERE Supp_Num = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST['delete'])){
		$delete_qry = "DELETE FROM supplier WHERE Supp_Num = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../supplier.php");
?>