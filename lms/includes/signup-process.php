<?php  session_start(); 
	// database connection
	include 'dbcon.php';

	// error message when DB connection fails
	if(!$db_conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	//Get values pause from in login.php file
	$firstname = $_POST['first'];
	$lastname = $_POST['last'];
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	
	$passwordin1=password_hash($password, PASSWORD_DEFAULT);
	
	echo "$passwordin1";
	$sql = "INSERT INTO staff (Staff_FName, Staff_LName, Staff_Username, Staff_Pwd, Staff_AccountType)
	VALUES ('$firstname', '$lastname', '$username', '$passwordin1', 'user')";
	$result = $db_conn->query($sql);
	
	header("location: ../signup.php");
?>