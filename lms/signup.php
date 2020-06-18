<?php include 'includes/header.php'; ?>

<head>
	<title>Sign Up</title>
</head>
<div="main">
	<div id="clouds">
		<?php include 'includes/clouds.php'; ?>
		
		<div id="cloud-content">
			<h1 class="center-padding">Sign Up</h1><br/>
			<form action="includes/signup-process.php" method="POST">
				<div class="group">      
					<input type="text" name="first"  required><br/>
			    	<span class="highlight"></span>
			    	<span class="bar"></span>
			    	<label>First Name</label>
			    </div>
			    <div class="group">      
					<input type="text" name="last" required><br/>
			    	<span class="highlight"></span>
			    	<span class="bar"></span>
			    	<label>Last Name</label>
			    </div>
			    <div class="group">      
					<input type="text" name="user" required><br/>
			    	<span class="highlight"></span>
			    	<span class="bar"></span>
			    	<label>Username</label>
			    </div>
			    <div class="group">      
					<input type="password" name="pass" required><br/>
			    	<span class="highlight"></span>
			    	<span class="bar"></span>
			    	<label>Password</label>
			    </div>
				<button id="btn" type="submit">Sign Up</button>
			</form>
		</div>
	</div>
		

	
</div>
<?php include 'includes/footer.php'; ?>
