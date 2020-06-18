<?php include 'includes/header.php';
	
	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in on admin account
		die(header("Location: index.php"));
	}

	include 'includes/dbcon.php'; //$db_conn

	$qry = "SELECT * FROM book";
	$result = $db_conn->query($qry);
?>

<head>
	<title>Books</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Book Table</p> 
	<h2 id="padding">Book Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Book ID</th>
		<th>Book Title</th>
		<th>Book Entry Date</th>
		<th>Book Type ID</th>
		<th>Book Year</th>
		<th>Book Call Number</th>
		<th>Book Number of Pages</th>
		<th>Book Height(cm)</th>
		<th>Book Remarks</th>
		<th>Book Copyright Date</th>
		<th>Publisher ID</th>
		<th>Shelf ID</th>
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
			<td><?php echo $row['Bk_Num']; ?></td>
			<td><?php echo $row['Bk_Title']; ?></td>
			<td><?php echo $row['Bk_Entrydate']; ?></td>
			<td><?php echo $row['BkTypeID']; ?></td>
			<td><?php echo $row['Bk_Year']; ?></td>
			<td><?php echo $row['Bk_CallNum']; ?></td>
			<td><?php echo $row['Bk_NumPages']; ?></td>
			<td><?php echo $row['Bk_Height']; ?></td>
			<td><?php echo $row['Bk_Remarks']; ?></td>
			<td><?php echo $row['Bk_CpyRightdate']; ?></td>
			<td><?php echo $row['Publisher_ID']; ?></td>
			<td><?php echo $row['ShelfID']; ?></td>
		</tr>
	<?php
		$i++;
	}
	$account = $_SESSION['account']; //show only if admin user
	if($account == "admin") { ?>
	
		<tr class="lastrow">
				<td colspan="15">
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

    document.frmUser.action = "editbook.php";
    document.frmUser.submit();
}


</script>
