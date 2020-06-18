<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST['addinv'])){
		$Inv_Num = $_POST['Inv_Num'];
		$Inv_date = $_POST['Inv_date'];
		$Supp_Num = $_POST['Supp_Num'];
		$Inv_PayDate = $_POST['Inv_PayDate'];
		$Inv_BankDftNum = $_POST['Inv_BankDftNum'];
		$Inv_Remarks = $_POST['Inv_Remarks'];
		
		

		$add_qry = "INSERT INTO invoice VALUES ('$Inv_Num', '$Inv_date','$Supp_Num','$Inv_PayDate','$Inv_BankDftNum','$Inv_Remarks')";
		$result = $db_conn->query($add_qry);
	}

	 if(isset($_POST['updateinv'])){
		$update_qry = "UPDATE invoice SET Inv_Num = '$_POST[invnum]', Inv_date = '$_POST[invdate]', Supp_Num = '$_POST[suppnum]', Inv_PayDate = '$_POST[invpaydate]',Inv_BankDftNum = '$_POST[invbanknum]' ,Inv_Remarks = '$_POST[invremarks]' WHERE Inv_Num = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	 if(isset($_POST['deleteinv'])){
		$delete_qry = "DELETE FROM invoice WHERE Inv_Num = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../invoice.php");
?>