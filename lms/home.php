<?php include 'includes/header.php'; 

if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
	die(header("Location: index.php"));
}

?>

<head>
	<?php 
	$account = $_SESSION['account'];
	if($account == "admin") { ?>
		<title>Admin</title>
	<?php 
	} else {
	?>
		<title>Staff User</title>
	<?php
	}
	?>
</head>

<div="main">
<div id="main-content">
	<div id="menu">
	<?php  
	$account = $_SESSION['account']; // admin home view ============================================
	if($account == "admin") { ?> 
	
		<div id="category">
			<h3>Book</h3>
			<a href="bookloanform.php"><div id="menutile">Book Loan Form</div></a>
			<a href="loan.php"><div id="menutile">Loan Table</div></a>
			<a href="loanitems.php"><div id="menutile">Loan Items Table</div></a>
			<a href="searchbook.php"><div id="menutile">Search Book</div></a>
			<a href="book.php"><div id="menutile">All Books</div></a>
			<a href="bkcopy.php"><div id="menutile">Book Copy</div></a>
			<a href="bookstatus.php"><div id="menutile">Book Status</div></a>
			<a href="booksubject.php"><div id="menutile">Book Subject</div></a>
			<a href="bookauthor.php"><div id="menutile">Book Author</div></a>
		</div>
		<div id="category">
			<h3>Management</h3>
			<a href="author.php"><div id="menutile">Authors</div></a>
			<a href="subject.php"><div id="menutile">Subject</div></a>
			<a href="bk_type.php"><div id="menutile">Book Type</div></a>
			<a href="publisher.php"><div id="menutile">Publishers</div></a>
			<a href="shelf.php"><div id="menutile">Shelf</div></a>
			<a href="loan_type.php"><div id="menutile">Loan Type</div></a>
		</div>
		<div id="category">
			<h3>Admin</h3>
			<a href="supplier.php"><div id="menutile">Suppliers</div></a>
			<a href="invoice.php"><div id="menutile">Invoice</div></a>
			<a href="staff.php"><div id="menutile">Staff</div></a>
			<a href="suggestion_table.php"><div id="menutile">Suggestions</div></a>
			<a href="newbookreport.php"><div id="menutile">New Books Report</div></a>
			<a href="overduebookreport.php"><div id="menutile">Overdue Books Report</div></a>
		</div> 
	<?php  // ===================================  Staff user view =====================================
	} else {
	?>
		<div id="category">
			<a href="searchbook.php"><div id="menutile">Search Book</div></a>
			<a href="book.php"><div id="menutile">ALL Books</div></a>
			<a href="author.php"><div id="menutile">Authors</div></a>
			<a href="subject.php"><div id="menutile">Subjects</div></a>
		</div>
		<div id="category">
			<a href="bkcopy.php"><div id="menutile">Book Copy</div></a>
			<a href="bookstatus.php"><div id="menutile">Book Status</div></a>
			<a href="booksubject.php"><div id="menutile">Book Subject</div></a>
			<a href="bookauthor.php"><div id="menutile">Book Author</div></a>
		</div>
		<div id="category">
			<a href="newbookreport.php"><div id="menutile">New Books Report</div></a>
			<a href="suggestion.php"><div id="menutile">Suggestions Form</div></a>
			<a href="help.php"><div id="menutile">Help</div></a>
		</div> 
	<?php 
	} // =========================================================================================================
	?>
	</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
