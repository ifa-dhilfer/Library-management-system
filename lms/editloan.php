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
	<title>Loan</title>

	<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
    </script>
 
	<script>
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
        jQuery(function($){ //on document.ready
            $('#loan_date').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#addloan_date').datepicker({ dateFormat: "yy-mm-dd" }).val();
        })
    }
	</script>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="loan.php">Loan Table</a> > Edit Mode</p> 
	<h2 id="padding">Loan Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: 5%;">
	<tr> 
	<!-- table headings -->
		<th>Loan Number</th>
		<th>Loan Date</th>
		<th>Staff ID</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM loan order by Loan_Num";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/loan-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			
			<td><input type="text" name="num" value="<?php echo $row['Loan_Num']; ?>">
			</td>
			<td><input id="loan_date" type="date" name="date" value="<?php echo $row['Loan_Date']; ?>">
			</td>
			<td><input type="text" name="sid" value="<?php echo $row['Staff_ID']; ?>">
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Loan_Num']; ?>">
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
	<form action="includes/loan-process.php" method="post">
	<tr>
		<td><input type="text" name="newnum"></td>
		<td><input id="addloan_date" type="date" name="newdate"></td>
		<td><input type="text" name="newsid"></td>
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

