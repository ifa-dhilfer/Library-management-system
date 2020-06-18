<?php include 'includes/header.php';

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}

?>

<head>
	<title>Suggestion Form</title>
</head>
<div="main">
	<div id="clouds">
		<?php include 'includes/clouds.php'; ?>
		
		<div id="cloud-content">
		<h1>Suggestion Form</h1>
		<p>Give us feedback what you think should be made to improve the SCS library system.</p>
		<form action="includes/suggestion-process.php" method="POST">
			<div class="sug_group">  
				<label>Subject:</label><br/>
				<input type="text" name="subject" required>
		    </div>
		    <br/>
		    <div class="sug_group">
		    	<label>Suggestion:</label><br/>
				<textarea style="width:130%;" cols="25" rows="5" saftype="text" name="feedback" required></textarea>
		    </div>
		    <br/><br/>
			<button id="btn" type="submit">Submit</button>
		</form>
	</div>
		

	
</div>
<?php include 'includes/footer.php'; ?>
