<?php include 'includes/header.php';

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}

	include 'includes/dbcon.php'; // $db_conn

	$keyword = "";	
	$queryCondition = "";
	if(!empty($_POST["keyword"])) { //if search textbox not empty
		$keyword = $_POST["keyword"]; //get search key word 
		$wordsAry = explode(" ", $keyword); //break key word string into array if there is multiple words
		$wordsCount = count($wordsAry); //count key words
		$queryCondition = " WHERE "; 
		for($i=0;$i<$wordsCount;$i++) { // match key words with book table
			$queryCondition .= "Bk_Num LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_Title LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_Entrydate LIKE '%" . $wordsAry[$i] . "%' OR 
			BkTypeID LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_Year LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_CallNum LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_NumPages LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_Height LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_Remarks LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_CpyRightdate LIKE '%" . $wordsAry[$i] . "%' OR 
			Publisher_ID LIKE '%" . $wordsAry[$i] . "%' OR 
			ShelfID LIKE '%" . $wordsAry[$i] . "%'";
			
			if($i!=$wordsCount-1) {
				$queryCondition .= " OR ";
			}
		}
	}
	$orderby = " ORDER BY Bk_Num"; 
	$sql = "SELECT * FROM book " . $queryCondition;
	$result = mysqli_query($db_conn,$sql);	
?>
<?php 
	function highlightKeywords($text, $keyword) {
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);
		
		for($i=0;$i<$wordsCount;$i++) {
			$highlighted_text = "<span style='font-weight:bold; background: yellow;'>$wordsAry[$i]</span>";
			$text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
		}

		return $text;
	}

	?>

	<head>
		<title>Book Search</title>	
	<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="main">
	<div id="main-content">
		<h2>Book Search</h2>
    		<ul class="tab">
				<li class="active"><a href="searchbook.php" class="tablinks">Title</a></li>
				<li><a href="searchauthor.php" class="tablinks">Author</a></li>
				<li><a href="searchsubject.php" class="tablinks">Subject</a></li>
				<li><a href="help.php" class="tablinks">Help</a></li>
			</ul>
    		<!-- Search form -->
			<form name="frmSearch" method="post" action=""> 	
				<div class="search-box">
					<div>
						<input placeholder="Search Book Title..." type="text" name="keyword" class="InputBox" value="<?php echo $keyword; ?>"	/>
						<input type="submit" name="go" class="btnSearch" value="Search">
					</div>
				</div>
				</form>	
			<table id="table" style="margin-left: 0">
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
				</tr>
			<?php 
				$i=0;
				while($row = mysqli_fetch_assoc($result)) { 

				if($i%2==0)
					$classname="evenRow";
				else
					$classname="oddRow";
				
				$new_num = $row["Bk_Num"];
				if(!empty($_POST['keyword'])) {
					$new_num = highlightKeywords($row['Bk_Num'],$_POST['keyword']);
				}
				$new_title = $row['Bk_Title'];
				if(!empty($_POST['keyword'])) {
					$new_title = highlightKeywords($row['Bk_Title'],$_POST['keyword']);
				}
				$new_entrydate = $row['Bk_Entrydate'];
				if(!empty($_POST['keyword'])) {
					$new_entrydate = highlightKeywords($row['Bk_Entrydate'],$_POST['keyword']);
				}
				$new_typeid = $row['BkTypeID'];
				if(!empty($_POST['keyword'])) {
					$new_typeid = highlightKeywords($row['BkTypeID'],$_POST['keyword']);
				}
				$new_year = $row['Bk_Year'];
				if(!empty($_POST['keyword'])) {
					$new_year = highlightKeywords($row['Bk_Year'],$_POST['keyword']);
				}
				$new_callnum = $row['Bk_CallNum'];
				if(!empty($_POST['keyword'])) {
					$new_callnum = highlightKeywords($row['Bk_CallNum'],$_POST['keyword']);
				}
				$new_numpage = $row['Bk_NumPages'];
				if(!empty($_POST['keyword'])) {
					$new_numpage = highlightKeywords($row['Bk_NumPages'],$_POST['keyword']);
				}
				$new_height = $row['Bk_Height'];
				if(!empty($_POST['keyword'])) {
					$new_height = highlightKeywords($row['Bk_Height'],$_POST['keyword']);
				}
				$new_remarks = $row['Bk_Remarks'];
				if(!empty($_POST['keyword'])) {
					$new_remarks = highlightKeywords($row['Bk_Remarks'],$_POST['keyword']);
				}
				$new_copyright = $row['Bk_CpyRightdate'];
				if(!empty($_POST['keyword'])) {
					$new_copyright = highlightKeywords($row['Bk_CpyRightdate'],$_POST['keyword']);
				}
				$new_pubid = $row['Publisher_ID'];
				if(!empty($_POST['keyword'])) {
					$new_pubid = highlightKeywords($row['Publisher_ID'],$_POST['keyword']);
				}
				$new_shelfid = $row['ShelfID'];
				if(!empty($_POST['keyword'])) {
					$new_shelfid = highlightKeywords($row['ShelfID'],$_POST['keyword']);
				}
				?>
				<tr class="<?php if(isset($classname)) echo $classname;?>">
					<td><?php echo $new_num; ?></td> <!-- prints search results -->
					<td><?php echo $new_title; ?></td>
					<td><?php echo $new_entrydate; ?></td>
					<td><?php echo $new_typeid; ?></td>
					<td><?php echo $new_year; ?></td>
					<td><?php echo $new_callnum; ?></td>
					<td><?php echo $new_numpage; ?></td>
					<td><?php echo $new_height; ?></td>
					<td><?php echo $new_remarks; ?></td>
					<td><?php echo $new_copyright; ?></td>
					<td><?php echo $new_pubid; ?></td>
					<td><?php echo $new_shelfid; ?></td>
				</tr>
			<?php 
				$i++;
			} 
			?>
			</table>
			
			<a style="float: right;" href="#top">[top of page]</a><br/><br/><br/>
		</div>
		</div>
		<br/><br/><br/><br/>

<?php include 'includes/footer.php'; ?>


