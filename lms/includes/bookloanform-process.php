<?php  session_start(); 
	// database connection
	include 'dbcon.php';

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	if(isset($_POST['submit'])){
		//Get values pause from in login.php file
		$loan_num = $_POST['loan_num'];
		$bkaccession_num = $_POST['bkaccession_num'];
		$loan_date = $_POST['loan_date'];
		$loantype_id = $_POST['loantype_id'];
		$remarks = $_POST['remarks'];
		$staff_id = $_POST['staff_id'];

		
		$sql = "SELECT * FROM loantype WHERE LoanTyp_ID = '$loantype_id';";
		$result = $db_conn->query($sql);

		$row =  mysqli_fetch_assoc($result); // get loan duration value
		$duration = $row['LoanTyp_Duration'];
		$date=date_create($loan_date);
		date_modify($date, "+". $duration." days" ); // add duration days to loan date
		$due_date = date_format($date,"Y-m-d");

		
		$qry1 = "INSERT INTO loan VALUES (
		'$loan_num', 
		'$loan_date', 
		'$staff_id')";
		$result1 = $db_conn->query($qry1);

		$qry2 = "INSERT INTO loanitems VALUES (
		'$loan_num', 
		'$loan_num', 
		'$due_date',
		'0000-00-00', 
		'$remarks', 
		'$bkaccession_num',
		'$loantype_id',
		'No')";
		$result2 = $db_conn->query($qry2);
	}

	
	header("location: ../loanitems.php");
?>