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
	<title>Loan Items</title>

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
        	$('#ddate').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#rdate').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#addduedate').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#addreturndate').datepicker({ dateFormat: "yy-mm-dd" }).val();
        })
    }
	</script>


</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="loanitems.php">Loan Items Table</a> > Edit Mode</p> 
	<h2 id="padding">Loan Items Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: -5%;">
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
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM loanitems";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/loanitems-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			
			<td><input id="col-width" type="text" name="llnum" value="<?php echo $row['LoanLine_Num']; ?>">
			</td>
			<td><input  id="col-width"type="text" name="lnum" value="<?php echo $row['Loan_Num']; ?>">
			</td>
			<td><input id="ddate" type="date" name="lldd" value="<?php echo $row['LoanLine_DueDate']; ?>">
			</td>
			<td><input id="rdate" type="date" name="llrd" value="<?php echo $row['LoanLine_ReturnDate']; ?>">
			</td>
			<td><input id="col-width" type="text" name="llr" value="<?php echo $row['LoanLine_Remarks']; ?>">
			</td>
			<td><input id="col-width" type="text" name="bkan" value="<?php echo $row['Bk_AccessionNum']; ?>">
			</td>
			<td><input id="col-width" type="text" name="ltid" value="<?php echo $row['LoanTyp_ID']; ?>">
			</td>
			<td><input id="col-width" type="text" name="lclear" value="<?php echo $row['Loan_Clear']; ?>">
			</td>
			<td>
				<!-- hidden unchanged PK to target the row to be updated -->
				<input id="col-width" type="hidden" name="hidden" value="<?php echo $row['LoanLine_Num']; ?>">
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
	<form action="includes/loanitems-process.php" method="post">
	<tr>
		<td><input id="col-width" type="text" name="newllnum"></td>
		<td>
			<select id="col-width" name="newlnum">
				<?php 
				$qry = "SELECT * FROM loan";
				$result = $db_conn->query($qry);

				while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row[Loan_Num] . "'>" . $row[Loan_Num] . "</option>";
					
				}
				?>
			</select>	
		</td>
		<td><input id="addduedate" type="date" name="newlldd"></td>
		<td><input id="addreturndate" type="date" name="newllrd"></td>
		<td><input id="col-width" type="text" name="newllr"></td>
		<td>
			<select id="col-width" name="newbkan">
				<?php 
				$qry = "SELECT * FROM bookcopy";
				$result = $db_conn->query($qry);

				while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row[Bk_AccessionNum] . "'>" . $row[Bk_AccessionNum] . "</option>";
					
				}
				?>
			</select>	
		</td>
		<td>
			<select id="col-width" name="newltid">
				<?php 
				$qry = "SELECT * FROM loantype";
				$result = $db_conn->query($qry);

				while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row[LoanTyp_ID] . "'>" . $row[LoanTyp_ID] . "</option>";
					
				}
				?>
			</select>	
		</td>
		<td>
			<select id="col-width" name="newlclear">
				<option value="No">No</option>
				<option value="Yes">Yes</option>
			</select>	
		</td>
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

<style type="text/css">
	#col-width{
		width: 100px;
	}
</style>