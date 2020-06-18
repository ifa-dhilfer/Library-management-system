<?php include 'includes/header.php';

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}

	include 'includes/dbcon.php'; //$db_conn

	$qry = "SELECT * FROM book";
	$result = $db_conn->query($qry);

?>

<head>
	<title>New Books</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > New Books</p> 
	<h2 id="padding">New Books This Week</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Book ID</th>
		<th>Book Title</th>
		<th>Book Entry Date</th>
		<th>Book Year</th>
		<th>Book Call Number</th>
		<th>Book Remarks</th>
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

		<!-- Calculates the due dates -->
		<?php
		$entdte = $row['Bk_Entrydate']; 
		$cnow = date("d-m-Y");
		
		$date1 = date_create($entdte);
		$date2 = date_create($cnow);
		$diff = date_diff($date1, $date2);


		if(($diff->format("%a"))<= 7){ // Display entries less than 7 days old
			?>

			<td><?php echo $row['Bk_Num']; ?></td>
			<td><?php echo $row['Bk_Title']; ?></td>
			<td><?php echo $row['Bk_Entrydate']; ?></td>
			<td><?php echo $row['Bk_Year']; ?></td>
			<td><?php echo $row['Bk_CallNum']; ?></td>
			<td><?php echo $row['Bk_Remarks']; ?></td>
		</tr>
		
	<?php
		}
		$i++;
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
