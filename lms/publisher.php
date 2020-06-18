<?php
include 'includes/dbcon.php'; //$db_conn

$qry = "SELECT * FROM publisher Order by Publisher_ID ASC";
$result = $db_conn->query($qry);

include 'includes/header.php';

if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
	die(header("Location: index.php"));
}
?>

<head>
	<title>Publisher</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Publisher Table</p> 
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
			<td><?php echo $row['Publisher_ID']; ?></td>
			<td><?php echo $row['Publisher_Name']; ?></td>
			<td><?php echo $row['Publisher_City']; ?></td>
			<td><?php echo $row['Publisher_Country']; ?></td>
			<td><?php echo $row['Publisher_Addr']; ?></td>
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

    document.frmUser.action = "editpublisher.php";
    document.frmUser.submit();
}


</script>