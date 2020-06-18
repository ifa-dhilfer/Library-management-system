<?php include 'includes/header.php';

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}

	?>

	<head>
		<title>Book Search Help</title>	
	<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="main">
	<div id="main-content">
		<h2>Help Section</h2>
    		<ul class="tab">
				<li><a href="searchbook.php" class="tablinks">Title</a></li>
				<li><a href="searchauthor.php" class="tablinks">Author</a></li>
				<li><a href="searchsubject.php" class="tablinks">Subject</a></li>
				<li class="active"><a href="help.php" class="tablinks">Help</a></li>
			</ul>
			<h3>Finding Information</h3>
			<h4>Searching the Library Catalogue</h4>
			<p>
			<b>Title Search</b><br/>

			Allows you to search for words in the title or series title and also allows you to browse through titles beginning with certain words. Enter the words you would like to find, select the type of search then click the OK button.<br/><br/>

			If your search is successful a page of titles will be displayed.<br/><br/>

			<a href="searchbook.php">Try a Title Search Now!</a>
			<br/><br/>
			<b>Author Search</b><br/>

			Allows you to search for words in an author's name. You can select to search all authors, only individuals, or only organisations. Enter the words you would like to find, select the type of search then click the OK button.<br/><br/>

			If your search is successful a page of names will be displayed. <br/><br/>
			<a href="searchauthor.php">Try an Author Search Now!</a>
			<br/><br/>
			<b>Subject Search</b><br/>

			Allows you to search for words in a subject heading and also allows you to browse through subjects beginning with some text. Enter the words you would like to find, select the type of search then click the OK button.<br/><br/>

			If your search is successful a page of subject headings will be displayed. <br/><br/>

			<a href="searchsubject.php">Try an Subject Search Now!</a>
			<a style="float: right;" href="#top">[top of page]</a><br/><br/><br/>

			</p>
		</div>
		</div>
		<br/><br/><br/><br/>

<?php include 'includes/footer.php'; ?>

