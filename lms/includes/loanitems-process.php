<?php
	// connect to the server and select database
	$db_conn = mysqli_connect("localhost","root","", "library");

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST[add])){
		$llnumb = $_POST['newllnum'];
		$lnumb = $_POST['newlnum'];
		$llduedate = $_POST['newlldd'];
		$llretdate = $_POST['newllrd'];
		$llremarks = $_POST['newllr'];
		$bkaccnumb = $_POST['newbkan'];
		$ltypid = $_POST['newltid'];
		$newlclear = $_POST['newlclear'];

		$add_qry = "INSERT INTO loanitems VALUES (
		'$llnumb', 
		'$lnumb', 
		'$llduedate',
		'$llretdate', 
		'$llremarks', 
		'$bkaccnumb',
		'$ltypid',
		'$newlclear')";
		$result = $db_conn->query($add_qry);
	}


	if(isset($_POST[update])){
		$update_qry = "UPDATE loanitems SET 
		LoanLine_Num = '$_POST[llnum]', 
		Loan_Num = '$_POST[lnum]', 
		LoanLine_DueDate = '$_POST[lldd]',
		LoanLine_ReturnDate = '$_POST[llrd]', 
		LoanLine_Remarks = '$_POST[llr]', 
		Bk_AccessionNum = '$_POST[bkan]',
		LoanTyp_ID = '$_POST[ltid]',
		Loan_Clear = '$_POST[lclear]'
		WHERE LoanLine_Num = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}

	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM loanitems WHERE LoanLine_Num = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editloanitems.php");
?>