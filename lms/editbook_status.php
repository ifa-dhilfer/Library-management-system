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
	<title>Book Status</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="bookstatus.php">Book Status Table</a> > Edit Mode</p> 
	<h2 id="padding">Book Status Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Book Status ID</th>
		<th>Book Status Description</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM bookstatus";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/bookstatus-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<!-- <td><input type="checkbox" name="select[]" value="<?php echo $row["Status_ID"]; ?>" ></td> -->
			<td><input type="text" name="id" value="<?php echo $row['Status_ID']; ?>">
			</td>
			<td><input type="text" name="desc" value="<?php echo $row['Status_Desc']; ?>">
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Status_ID']; ?>">
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
	<form action="includes/bookstatus-process.php" method="post">
	<tr>
		<td><input type="text" name="newid"></td>
		<td>
			<select name="newdesc" required style="width:150px;">
				<option value="Available">Available</option>
				<option value="Un Available">Un Available</option>
			</select>
		</td>
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

