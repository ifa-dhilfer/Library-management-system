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
	<title>Overdue Books</title>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > Overdue Book Report</p> 
	<h2 id="padding">Overdue Book Report</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%;">
	<tr> 
	<!-- table headings -->
		<th>Staff ID</th>
		<th>Staff Last Name</th>
		<th>Staff First Name</th>
		<th>Book Accession Number</th>
		<th>Remarks</th>
		<th>No. of Overdue Days</th>
		
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
	$qry1 = "SELECT * FROM loanitems as a, loan as b, staff as c
	WHERE a.Loan_Num=b.Loan_Num and a.Loan_Clear='No' and c.Staff_ID=b.Staff_ID ";

	//$qry1 = "SELECT * FROM loanitems as a, loan as b, staff as c
	//WHERE a.Loan_Num=b.Loan_Num and a.LoanLine_ReturnDate>a.LoanLine_DueDate and a.Loan_Clear='No' and c.Staff_ID=b.Staff_ID ";

	$result1 = $db_conn->query($qry1);

	$i=0;
	while($row = mysqli_fetch_array($result1)){
	if($i%2==0)
			$classname="evenRow";
		else
			$classname="oddRow";
		?>
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			
				<td><?php echo $row['Staff_ID']; ?></td>
				<td><?php echo $row['Staff_LName']; ?></td>
				<td><?php echo $row['Staff_FName']; ?></td>
				<td><?php echo $row['Bk_AccessionNum']; ?></td>
				<td><?php echo $row['LoanLine_Remarks'] ?></td>
				<?php 
				//$row['LoanLine_ReturnDate']
				$cnow = date("Y-m-d");
				$date1 = date_create($cnow); 
				$date2 = date_create($row['LoanLine_DueDate']);

				$diff = date_diff($date1, $date2);

				?>
				<td><?php echo $diff->format("%a"); ?></td>
		</tr>
	<?php
		}	
		$i++;
		?>
	</table>
	</form>
	<a style="float: right;" href="#top">[top of page]</a><br/><br/><br/><br/>
</div>
</div>


<?php include "includes/footer.php"; ?>

