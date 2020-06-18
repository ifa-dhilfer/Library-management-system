<?php

include 'includes/dbcon.php'; //$db_conn

include 'includes/header.php'; 
	
if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
	die(header("Location: index.php"));
}
$account = $_SESSION['account'];
if($account == "user") {
	die(header("Location: home.php"));
}
?>

<head>
	<title>Author</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="author.php">Author Table</a> > Edit Mode</p> 
	<h2 id="padding">Author Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Author ID</th>
		<th>Author First Name</th>
		<th>Author Last Name</th>
		<th>Author Initial</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM author";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/author-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td><input type="text" name="id" value="<?php echo $row['Author_ID']; ?>">
			</td>
			<td><input type="text" name="fname" value="<?php echo $row['Author_FName']; ?>">
			</td>
			<td><input type="text" name="lname" value="<?php echo $row['Author_LName']; ?>">
			</td>
			<td><input type="text" name="initial" value="<?php echo $row['Author_Initial']; ?>">
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Author_ID']; ?>">
				<button type="submit" name="update">Update</button>
				<button type="submit" name="delete">Delete</button>
			</td>
		</tr>
		</form>
	<?php
		$i++;
	}
	?>
	<!-- Add new row -->
	<form action="includes/author-process.php" method="post">
	<tr>
		<td><input type="text" name="newid"></td>
		<td><input type="text" name="newfname"></td>
		<td><input type="text" name="newlname"></td>
		<td><input type="text" name="newinitial"></td>
		<td><button type="submit" name="add">Add</button></td>
	</tr>
	</form>
	</table>
	</form>
	<br/>
	<br/>
	<br/>
	<br/><br/>
</div>
</div>


<?php include "includes/footer.php"; ?>
