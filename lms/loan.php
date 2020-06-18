<?php
include 'includes/dbcon.php'; //$db_conn

$qry = "SELECT * FROM loan";
$result = $db_conn->query($qry);

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
	<title>Loan</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Loan Table</p> 
	<h2 id="padding">Loan Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%">
	<tr> 
	<!-- table headings -->
		<th>Loan Number</th>
		<th>Loan Date</th>
		<th>Staff ID</th>
		
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
			<td><?php echo $row['Loan_Num']; ?></td>
			<td><?php echo $row['Loan_Date']; ?></td>
			<td><?php echo $row['Staff_ID']; ?></td>
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

    document.frmUser.action = "editloan.php";
    document.frmUser.submit();
}


</script>
