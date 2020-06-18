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
	<title>Book Subject</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="booksubject.php">Book Subject Table</a> > Edit Mode</p> 
	<h2 id="padding">Book Subject Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%;">
	<tr> 
	<!-- table headings -->
		<th>Subject ID</th>
		<th>Book Number</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM booksubject Order by Subject_ID ASC";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/booksubject-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			
			<td>
			<input type="text" name="subID" value="<?php echo $row['Subject_ID']; ?>">
			</td>
			
			<td>
			<input type="text" name="bknum" value="<?php echo $row['Bk_Num']; ?>">
			</td>
			
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Subject_ID']; ?>">
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
	<form action="includes/booksubject-process.php" method="post">
	<tr>
		<td>
		<!-- <input type="text" name="Subject_ID"> -->
		<select name="Subject_ID" style="width: 150px;">
			<?php 
			$qry = "SELECT * FROM subject";
			$result = $db_conn->query($qry);

			while($row = mysqli_fetch_array($result)) {
					echo "<option value='" . $row[Subject_ID] . "'>" . $row[Subject_ID] . " " . $row[Subject_Desc] . "</option>";
				
			}
			?>
		</select>	
		</td>
		<td>
		<!-- <input type="text" name="Bk_Num"> -->
		<select name="Bk_Num" style="width: 150px;">
			<?php 
			$qry = "SELECT * FROM book";
			$result = $db_conn->query($qry);

			while($row = mysqli_fetch_array($result)) {
					echo "<option value='" . $row[Bk_Num] . "'>" . $row[Bk_Num] . "</option>";
				
			}
			?>
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