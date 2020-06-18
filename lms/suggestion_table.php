<?php include 'includes/header.php';

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}
	$account = $_SESSION['account'];
	if($account == "user") {
		die(header("Location: home.php"));
	}

	include 'includes/dbcon.php'; //$db_conn

	$qry = "SELECT * FROM suggestion";
	$result = $db_conn->query($qry);

?>

<head>
	<title>Suggestion Table</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Suggestion Table</p> 
	<h2 id="padding">Suggestion Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th style="width: 200px;">Subject</th>
		<th style="width: 600px;">Suggestion</th>
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
			<td><?php echo $row['sug_subject']; ?></td>
			<td><?php echo $row['sug_feedback']; ?></td>
		</tr>
	<?php
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
