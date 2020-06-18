<?php
include 'includes/dbcon.php'; //$db_conn

$qry = "SELECT * FROM loanitems";
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
	<title>Loan Items</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Loan Items Table</p> 
	<h2 id="padding">Loan Items Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%;">
	<tr> 
	<!-- table headings -->
		<th>Loan Line Number</th>
		<th>Loan Number</th>
		<th>Loan Line Due Date</th>
		<th>Loan Line Return Date</th>
		<th>Loan Line Remarks</th>
		<th>Book Accession Number</th>
		<th>Loan Type ID</th>
		<th>Loan Clear</th>
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
			<td><?php echo $row['LoanLine_Num']; ?></td>
			<td><?php echo $row['Loan_Num']; ?></td>
			<td><?php echo $row['LoanLine_DueDate']; ?></td>
			<td><?php echo $row['LoanLine_ReturnDate']; ?></td>
			<td><?php echo $row['LoanLine_Remarks']; ?></td>
			<td><?php echo $row['Bk_AccessionNum']; ?></td>
			<td><?php echo $row['LoanTyp_ID']; ?></td>
			<td><?php echo $row['Loan_Clear']; ?></td>
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

    document.frmUser.action = "editloanitems.php";
    document.frmUser.submit();
}


</script>
