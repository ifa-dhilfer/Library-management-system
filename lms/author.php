<?php include 'includes/header.php'; 

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}

	include 'includes/dbcon.php'; //$db_conn

	$qry = "SELECT * FROM author";
	$result = $db_conn->query($qry);

?>

<head>
	<title>Author</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Author Table</p> 
	<h2 id="padding">Author Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Author ID</th>
		<th>Author First Name</th>
		<th>Author Last Name</th>
		<th>Author Initial</th>
		
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
			<td><?php echo $row['Author_ID']; ?></td>
			<td><?php echo $row['Author_FName']; ?></td>
			<td><?php echo $row['Author_LName']; ?></td>
			<td><?php echo $row['Author_Initial']; ?></td>
		</tr>
	<?php
		$i++;
	}
	$account = $_SESSION['account']; //show only if admin user
	if($account == "admin") { ?>
	
		<tr class="lastrow">
				<td colspan="10">
					<button onClick="edit();" />Edit Mode</button>
				</td>
		</tr>
	<?php 
	} 
	?>
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

    document.frmUser.action = "editauthor.php";
    document.frmUser.submit();
}


</script>
