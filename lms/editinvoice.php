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
	<title>Invoice</title>

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
            $('#inv_date').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#inv_paydate').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#add_invdate').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#add_payinvdate').datepicker({ dateFormat: "yy-mm-dd" }).val();
        })
    }
	</script>
</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="invoice.php">Invoice Table</a> > Edit Mode</p> 
	<h2 id="padding">Invoice Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table">
	<tr> 
	<!-- table headings -->
		<th>Invoice Number</th>
		<th>Invoice Date</th>
		<th>Supplier Number</th>
		<th>Invoice Pay Date</th>
		<th>Invoice BankDraft Number</th>
		<th>Invoice Remarks</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM invoice Order by Inv_Num ASC";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/invoice-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<!-- <td><input type="checkbox" name="select[]" value="<?php //echo $row['Inv_Num']; ?>" ></td> -->
			<td>
			<input type="text" name="invnum" value="<?php echo $row['Inv_Num']; ?>">
			</td>
			
			<td>
			<input type="date" id="inv_date" name="invdate" value="<?php echo $row['Inv_date']; ?>">
			</td>
			
			
			<td>
			<input type="text" name="suppnum" value="<?php echo $row['Supp_Num']; ?>">
			</td>
			
			<td>
			<input type="date" id="inv_paydate" name="invpaydate" value="<?php echo $row['Inv_PayDate']; ?>">
			</td>
			
			<td>
			<input type="text" name="invbanknum" value="<?php echo $row['Inv_BankDftNum']; ?>">
			</td>
			
			<td>
			<input type="text" name="invremarks" value="<?php echo $row['Inv_Remarks']; ?>">
			</td>
			
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Inv_Num']; ?>">
				<button type="submit" name="updateinv">Update</button>
				<button type="submit" name="deleteinv">Delete</button>
			</td>
		</tr>
		</form>
	<?php
		$i++;
	}
	?>
	<!-- Add new row -->
	<form action="includes/invoice-process.php" method="post">
	<tr>
		<td><input type="text" name="Inv_Num"></td>
		<td><input id="add_invdate" type="date" name="Inv_date"></td>
		<td>
		<!-- <input type="text" name="Supp_Num"> -->
		<select name="Inv_Num" style="width: 150px;">
		<?php 
		$qry = "SELECT * FROM supplier";
		$result = $db_conn->query($qry);

		while($row = mysqli_fetch_array($result)) {
				echo "<option value='" . $row[Supp_Num] . "'>" . $row[Supp_Num] . "</option>";
			
		}
		?>
		</select>
		</td>
		<td><input id="add_payinvdate" type="date" name="Inv_PayDate"></td>
		<td><input type="number_format" name="Inv_BankDftNum"></td>
		<td><input type="text" name="Inv_Remarks"></td>
		<td><button type="submit" name="addinv">Add</button></td>
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