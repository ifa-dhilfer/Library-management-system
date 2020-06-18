<?php
	session_start(); 
	include 'dbcon.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/cloud-icon.png" />
	<link href="style.css" rel="stylesheet" type="text/css"/>

<body>

<div id="navbar-container"> 
	<ul id="navbar">
		<li id="logo"><a href="home.php"><img width="250px" height="40px" src="images/d.png"/></a></li>
		<li><a href="home.php">HOME</a></li>
		<li><a href="signup.php">SIGN UP</a></li>
		<li><a href="contact.php">CONTACT</a></li>
		<li><a href="about.php">ABOUT</a></li>
		<?php 
		if(isset($_SESSION['id'])) { ?>
			<li style="float:right; font-size: 20px; color: white;">
			<form action="includes/logout-process.php">
				Welcome <?php echo $_SESSION['firstname']; ?>!
				<button>Log Out</button>
			</form></li><?php	
		}
		else { ?>
			<li style="float:right;">
			<form action="includes/login-process.php" method="POST">
			<input type="text" name="user" placeholder="Username">
			<input type="password" name="pass" placeholder="Password">
			<button type="submit">Login</button>
			</form></li><?php
		} ?>
		
	</ul>
</div>
