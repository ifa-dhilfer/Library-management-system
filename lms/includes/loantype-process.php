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
		$dur = $_POST['newdur'];

		$add_qry = "INSERT INTO loantype VALUES ('$type', '$desc', '$dur')";
		$result = $db_conn->query($add_qry);
	}

	if(isset($_POST[update])){
		$update_qry = "UPDATE loantype SET LoanTyp_ID = '$_POST[id]', LoanTyp_Desc = '$_POST[desc]', LoanTyp_Duration = '$_POST[dur]'  WHERE LoanTyp_ID = '$_POST[hidden]'";
		$result = $db_conn->query($update_qry);
	}
	
	if(isset($_POST[delete])){
		$delete_qry = "DELETE FROM loantype WHERE LoanTyp_ID = '$_POST[hidden]'";
		$result = $db_conn->query($delete_qry);
	}

    header("location: ../editloan_type.php");
?>