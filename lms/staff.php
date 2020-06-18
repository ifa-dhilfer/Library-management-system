<?php
include 'includes/dbcon.php'; //$db_conn

$qry = "SELECT * FROM staff";
$result = $db_conn->query($qry);

include 'includes/header.php';

if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
	die(header("Location: index.php"));
}
?>

<head>
	<title>Staff</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Staff Table</p> 
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
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
		
		if($i%2==0)
			$classname="evenRow";
		else
			$classname="oddRow";
		?>
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td><?php echo $row['Staff_ID']; ?></td>
			<td><?php echo $row['Staff_FName']; ?></td>
			<td><?php echo $row['Staff_LName']; ?></td>
			<td><?php echo $row['Staff_Username']; ?></td>
			<td><?php echo $row['Staff_Pwd']; ?></td>
			<td><?php echo $row['Staff_AccountType']; ?></td>
		</tr>
	<?php
		$i++;
	}
	?>
	<!-- Button to add, update and delete -->
	<tr class="lastrow">
			<td colspan="10">
				<button onClick="edit();" />Edit Mode</button>
			</td>
	</tr>
	</table>
	</form>
	<br/>
	<br/>
	<br/>
	<br/><br/>
</div>
</div>


<?php include "includes/footer.php"; ?>

<script>

function edit() {

    document.frmUser.action = "editstaff.php";
    document.frmUser.submit();
}


</script>
