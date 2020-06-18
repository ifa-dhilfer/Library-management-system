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
	<title>Publisher</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="publisher.php">Publisher Table</a> > Edit Mode</p> 
	<h2 id="padding">Publisher Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Publisher ID</th>
		<th>Publisher Name</th>
		<th>Publisher City</th>
		<th>Publisher Country</th>
		<th>Publisher Address</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM publisher Order by Publisher_ID ASC";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/publisher-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<!-- <td><input type="checkbox" name="select[]" value="<?php echo $row["Publisher_ID"]; ?>" ></td> -->
			<td>
			<input type="text" name="pubID" value="<?php echo $row['Publisher_ID']; ?>">
			</td>
			
			<td>
			<input type="text" name="pubname" value="<?php echo $row['Publisher_Name']; ?>">
			</td>
			
			
			<td>
			<input type="text" name="pubcity" value="<?php echo $row['Publisher_City']; ?>">
			</td>
			
			<td>
			<input type="text" name="pubcountry" value="<?php echo $row['Publisher_Country']; ?>">
			</td>
			
			<td>
			<input type="text" name="pubaddr" value="<?php echo $row['Publisher_Addr']; ?>">
			</td>
			
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Publisher_ID']; ?>">
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
	<form action="includes/publisher-process.php" method="post">
	<tr>
		<td><input type="text" name="Publisher_ID"></td>
		<td><input type="text" name="Publisher_Name"></td>
		<td><input type="text" name="Publisher_City"></td>
		<td><input type="text" name="Publisher_Country"></td>
		<td><input type="text" name="Publisher_Addr"></td>
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