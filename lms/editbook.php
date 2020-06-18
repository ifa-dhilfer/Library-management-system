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
	<title>Books</title>

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
            $('#addentrydate').datepicker({ dateFormat: "yy-mm-dd" }).val();
            $('#addcopyright').datepicker({ dateFormat: "yy-mm-dd" }).val();
        })
    }
	</script>

</head>
<body>
<div id="main">
<div id="main-content">
	<!-- Breadcrumb -->
	<p><a href="home.php">Home</a> > <a href="book.php">Book Table</a> > Edit Mode</p> 
	<h2 id="padding">Book Table</h2>

	<form id="form" name="frmUser" method="post">
	<table id="table" style="margin-left: -8%;">
	<tr> 
	<!-- table headings -->
		<th>Book ID</th>
		<th>Book Title</th>
		<th>Book Entry Date</th>
		<th>Book Type ID</th>
		<th>Book Year</th>
		<th>Book Call Number</th>
		<th>Book Number of Pages</th>
		<th>Book Height(cm)</th>
		<th>Book Remarks</th>
		<th>Book Copyright Date</th>
		<th>Publisher ID</th>
		<th>Shelf ID</th>
		<th></th>
	</tr>
	<!-- While loop to fetch data from table -->
	<?php
		$qry = "SELECT * FROM book ORDER BY Bk_Num";
		$result = $db_conn->query($qry);

		$i=0;
		while($row = mysqli_fetch_array($result)) {
		
		if($i%2==0)
			$classname="evenRow";
		else
			$classname="oddRow";
		?>
		<form action="includes/book-process.php" method="post">
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td>
			<input class="col-width" type="text" name="num" value="<?php echo $row['Bk_Num']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="title" value="<?php echo $row['Bk_Title']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="date" name="entrydate" value="<?php echo $row['Bk_Entrydate']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="typeid" value="<?php echo $row['BkTypeID']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="year" value="<?php echo $row['Bk_Year']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="callnum" value="<?php echo $row['Bk_CallNum']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="numpages" value="<?php echo $row['Bk_NumPages']; ?>" required>
			</td>
			<td>
			<input class="col-width" class="col-width" type="text" name="height" value="<?php echo $row['Bk_Height']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="remarks" value="<?php echo $row['Bk_Remarks']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="date" name="copyright" value="<?php echo $row['Bk_CpyRightdate']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="pubid" value="<?php echo $row['Publisher_ID']; ?>" required>
			</td>
			<td>
			<input class="col-width" type="text" name="shelfid" value="<?php echo $row['ShelfID']; ?>" required>
			</td>
			<td><!-- hidden unchanged PK to target the row to be updated -->
				<input class="col-width" type="hidden" name="hidden" value="<?php echo $row['Bk_Num']; ?>">
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
	<form action="includes/book-process.php" method="post">
	<tr>
		<td><input class="col-width" type="text" name="addnum" required></td>
		<td><input class="col-width" type="text" name="addtitle" required></td>
		<td><input class="col-width" id="addentrydate" type="date" name="addentrydate" required></td>
		<td>
		<select name="addtypeid" style="width: 100px;">
			<?php 
			$qry = "SELECT * FROM booktype";
			$result = $db_conn->query($qry);

			while($row = mysqli_fetch_array($result)) {
					echo "<option value='" . $row[BkTypeID] . "'>" . $row[BkTypeID] . "</option>";
				
			}
			?>
		</select>
		</td>
		<td><input class="col-width" type="text" name="addyear" required></td>
		<td><input class="col-width" type="text" name="addcall" required></td>
		<td><input class="col-width" type="text" name="addnumpages" required></td>
		<td><input class="col-width" type="text" name="addheight" required></td>
		<td><input class="col-width" type="text" name="addremarks" required></td>
		<td><input class="col-width" id="addcopyright" type="date" name="addcopyright" required></td>
		<td>
		<select name="addpubid" style="width: 100px;">
			<?php 
			$qry = "SELECT * FROM publisher";
			$result = $db_conn->query($qry);

			while($row = mysqli_fetch_array($result)) {
					echo "<option value='" . $row[Publisher_ID] . "'>" . $row[Publisher_ID] . "</option>";
				
			}
			?>
		</select>
		</td>

		<td>
		<select name="addshelfid" style="width: 100px;">
			<?php 
			$qry = "SELECT * FROM shelf";
			$result = $db_conn->query($qry);

			while($row = mysqli_fetch_array($result)) {
					echo "<option value='" . $row[ShelfID] . "'>" . $row[ShelfID] . "</option>";
				
			}
			?>
		</select>	
		<!-- <input class="col-width" type="text" name="addshelfid" required> -->
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


<style>
.col-width{
	width: 70px;
}
</style>