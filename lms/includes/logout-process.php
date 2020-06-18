<?php
	session_start();
	session_destroy(); //to end a session
	header("location: ../index.php");
?>