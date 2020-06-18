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
	<title> Book Loan Form</title>

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
            $('#loandate').datepicker({ dateFormat: "yy-mm-dd" }).val();
        })
    }
	</script>
</head>
<body>
<div="main">
	<div id="clouds">
		<?php include 'includes/clouds.php'; ?>

		<div id="cloud-content">
		<form action="includes/bookloanform-process.php" method="POST">
			<h2>Book Loan Form</h2>
			<div>
				<label>Loan Number:</label><br/>
				<input type="text" name="loan_num" required><br/><br/>
			</div>
			<div>
				<label>Book Accession Number:</label><br/>
				<select name="bkaccession_num" style="width: 100px;" required>
					<?php 
					$qry = "SELECT * FROM bookcopy";
					$result = $db_conn->query($qry);

					while($row = mysqli_fetch_array($result)) {
							echo "<option value='" . $row['Bk_AccessionNum'] . "'>" . $row['Bk_AccessionNum'] . "</option>";
						
					}
				?>
				</select> <br/><br/>
			</div>
			<div>
				<label>Loan Date:</label><br/>
				<input id="loandate" type="date" name="loan_date" required><br/><br/>
			</div>
			<div>
				<label>Loan Type:</label><br/>
				<select name="loantype_id" style="width: 150px;" required>
					<?php 
					$qry = "SELECT * FROM loantype";
					$result = $db_conn->query($qry);

					while($row = mysqli_fetch_array($result)) {
							echo "<option value='" . $row['LoanTyp_ID'] . "'>" . $row['LoanTyp_Desc'] ."</option>";
						
					}
				?>
				</select> <br/><br/>
			</div>
			<div>
				<label>Book Remarks: (optional)</label> <br/>
				<input type="text" name="remarks"><br/><br/>
			</div>
			<div>
				<label>Staff ID:</label><br/>
				<select name="staff_id" style="width: 150px;" required>
					<?php 
					$qry = "SELECT * FROM staff";
					$result = $db_conn->query($qry);

					while($row = mysqli_fetch_array($result)) {
							echo "<option value='" . $row['Staff_ID'] . "'>" . $row['Staff_ID'] ."</option>";
						
					}
				?>
				</select> <br/><br/>
			</div>
			<button type="submit" name="submit">Submit</button>
		</form>
		</div>
	</div>
</div>


<?php include "includes/footer.php"; ?>


<style type="text/css">
	.input{
		float: left;

	}
</style>