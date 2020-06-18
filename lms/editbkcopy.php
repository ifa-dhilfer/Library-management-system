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
	<title>Book Copy</title>

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
            $('#addbked').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#bked').datepicker({ dateFormat: "yy-mm-dd" }).val();
        })
    }
	</script>

</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="bkcopy.php">Book Copy Table</a> > Edit Mode</p> 
	<h2 id="padding">Book Copy Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table">
	<tr> 
	<!-- table headings -->
		<th>Book Accession Number</th>
		<th>Book Copy Entry Date</th>
		<th>Book Copy Price</th>
		<th>Book Number</th>
		<th>Status Number</th>
		<th>Inovice Number</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM bookcopy";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) { 
		
		if($i%2==0) // styling purpose for even/odd rows
			$classname="evenRow"; 
		else
			$classname="oddRow";
		?>
		<form action="includes/bookcopy-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			
			<td><input type="text" name="bkan" value="<?php echo $row['Bk_AccessionNum']; ?>">
			</td>
			<td><input type="date" id="bked" name="bked" value="<?php echo $row['BkCpy_EntryDate']; ?>">
			</td>
			<td><input type="text" name="bkcp" value="<?php echo $row['Bk_Cpy_Price']; ?>">
			</td>
			<td><input type="text" name="bkn" value="<?php echo $row['Bk_Num']; ?>">
			</td>
			<td><input type="text" name="statid" value="<?php echo $row['Status_ID']; ?>">
			</td>
			<td><input type="text" name="innum" value="<?php echo $row['Inv_Num']; ?>">
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input type="hidden" name="hidden" value="<?php echo $row['Bk_AccessionNum']; ?>">
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
	<form action="includes/bookcopy-process.php" method="post">
	<tr>
		<td><input type="text" name="newbkan"></td>	
		<td><input id="addbked" type="date" name="newbked"></td>
		<td><input type="text" name="newbkcp"></td>
		<td>
			<select style="width: 150px" name="newbkn">
				<?php 
				$qry = "SELECT * FROM book";
				$result = $db_conn->query($qry);

				while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row[Bk_Num] . "'>" . $row[Bk_Num] . "</option>";
					
				}
				?>
			</select>
		</td>
		<td>
			<select style="width: 150px" name="newstatid">
				<?php 
				$qry = "SELECT * FROM bookstatus";
				$result = $db_conn->query($qry);

				while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row[Status_ID] . "'>" . $row[Status_ID] . "</option>";
					
				}
				?>
			</select>	
		</td>
		<td>
			<select style="width: 150px" name="newinnum">
				<?php 
				$qry = "SELECT * FROM invoice";
				$result = $db_conn->query($qry);

				while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row[Inv_Num] . "'>" . $row[Inv_Num] . "</option>";
					
				}
				?>
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

