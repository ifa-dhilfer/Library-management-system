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
	<title>Book Author</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="bookauthor.php">Book Author Table</a> > Edit Mode</p> 
	<h2 id="padding">Book Author Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Book Number</th>
		<th>Author Identification</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM bookauthor";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/bookauthor-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			
			<td><input id="col-width" type="text" name="bknum" value="<?php echo $row['Bk_Num']; ?>">
			</td>
			<td><input id="col-width" type="text" name="athid" value="<?php echo $row['Author_ID']; ?>">
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input id="col-width" type="hidden" name="hidden" value="<?php echo $row['Bk_Num']; ?>">
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
	<form action="includes/bookauthor-process.php" method="post">
	<tr>
		<td><input id="col-width" type="text" name="newbknum"></td>
		<td><input id="col-width" type="text" name="newathid"></td>
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

<style type="text/css">
	#col-width{
		width: 100px;
	}
</style>