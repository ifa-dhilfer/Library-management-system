<?php
	session_start(); //to remember variables in a session

	// database connection
	include 'dbcon.php';

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	//Get values pause from in login.php file
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$qry = "SELECT * FROM staff WHERE Staff_Username = '$username'";
	$result = $db_conn->query($qry);
	
	$row=$result->fetch_assoc();
	
	if (password_verify($password,$row['Staff_Pwd'])){
		$_SESSION['id'] = $row['Staff_ID'];
		$_SESSION['firstname'] = $row['Staff_FName'];
		$_SESSION['account'] = $row['Staff_AccountType'];
		header("location: ../home.php");
	}
	else{
		header("location: ../redirect.php");
		
	}
	
	
	
?>