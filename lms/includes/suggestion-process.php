<?php  session_start(); 
	// database connection
	include 'dbcon.php';

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	//Get values pause from in login.php file
	$subject = $_POST['subject'];
	$feedback = $_POST['feedback'];
	
	$sql = "INSERT INTO suggestion VALUES ('', '$subject', '$feedback')";
	$result = $db_conn->query($sql);
	
	mysqli_close($connection); // Close Connection
	header("location: ../suggestion.php");
	alert("Thank you for your feedback");
?>