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
	<title>Staff</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="staff.php">Staff Table</a> > Edit Mode</p> 
	<h2 id="padding">Staff Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Staff ID</th>
		<th>Staff First Name</th>
		<th>Staff Last Name</th>
		<th>Staff Username</th>
		<th>Staff Password</th>
		<th>Staff Account Type</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM staff";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/staff-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td><input type="text" name="staffid" value="<?php echo $row['Staff_ID']; ?>">
			</td>
			<td><input type="text" name="stafffn" value="<?php echo $row['Staff_FName']; ?>">
			</td>
			<td><input type="text" name="staffln" value="<?php echo $row['Staff_LName']; ?>">
			</td>
			<td><input type="text" name="staffun" value="<?php echo $row['Staff_Username']; ?>">
			</td>
			<td><input type="text" name="staffpwd" value="<?php echo $row['Staff_Pwd']; ?>">
			</td>
			<td><input type="text" name="staffacctype" value="<?php echo $row['Staff_AccountType']; ?>">
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Staff_ID']; ?>">
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
	<form action="includes/staff-process.php" method="post">
	<tr>
		<td><input type="text" name="newstaffid"></td>
		<td><input type="text" name="newstafffn"></td>
		<td><input type="text" name="newstaffln"></td>
		<td><input type="text" name="newstaffun"></td>
		<td><input type="password" name="newstaffpwd"></td>
		<td>
			<select name="newstaffacctype" style="width: 150px;">
				<option value="user">User</option>
				<option value="admin">Admin</option>
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

