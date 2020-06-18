<?php include 'includes/header.php';

	if(!isset($_SESSION['id'])) { // goes back to public home page if not signed in
		die(header("Location: index.php"));
	}

	include 'includes/dbcon.php'; // $db_conn
	$keyword = "";	
	$queryCondition = "";
	if(!empty($_POST["keyword"])) {
		$keyword = $_POST["keyword"];
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);
		$queryCondition = " WHERE ";
		for($i=0;$i<$wordsCount;$i++) {
			$queryCondition .= "Author_ID LIKE '%" . $wordsAry[$i] . "%' OR 
		 	Author_FName LIKE '%" . $wordsAry[$i] . "%' OR 
			Author_LName LIKE '%" . $wordsAry[$i] . "%' OR 
		 	Author_Initial LIKE '%" . $wordsAry[$i] . "%'";
			if($i!=$wordsCount-1) {
				$queryCondition .= " OR ";
			}
		}
	}
	$orderby = " ORDER BY Author_ID"; 
	$sql = "SELECT * FROM author " . $queryCondition;
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
		<title>Author Search</title>	
	</head>
	<body>
	<div id="main">
	<div id="main-content">
		<h2>Book Search</h2>
    		<ul class="tab">
				<li><a href="searchbook.php" class="tablinks">Title</a></li>
				<li class="active"><a href="searchauthor.php" class="tablinks">Author</a></li>
				<li><a href="searchsubject.php" class="tablinks">Subject</a></li>
				<li><a href="help.php" class="tablinks">Help</a></li>
			</ul>
    		<!-- Search form -->
			<form name="frmSearch" method="post" action=""> 	
				<div class="search-box">
					<div>
						<input placeholder="Search Book Author..." type="text" name="keyword" class="InputBox" value="<?php echo $keyword; ?>"	/>
						<input type="submit" name="go" class="btnSearch" value="Search">
					</div>
				</div>
				</form>	
				<table id="table" style="margin-left: 0">
						<tr> 
						<!-- table headings -->
							<th>Author ID</th>
							<th>Author First Name</th>
							<th>Author Last Name</th>
							<th>Author Initials</th>
						</tr>
					<?php 
						$i=0;
						while($row = mysqli_fetch_assoc($result)) { 

						if($i%2==0)
							$classname="evenRow";
						else
							$classname="oddRow";
						
						$Author_ID = $row["Author_ID"];
						if(!empty($_POST['keyword'])) {
							$Author_ID = highlightKeywords($row['Author_ID'],$_POST['keyword']);
						}
						$Author_FName = $row['Author_FName'];
						if(!empty($_POST['keyword'])) {
							$Author_FName = highlightKeywords($row['Author_FName'],$_POST['keyword']);
						}
						$Author_LName = $row['Author_LName'];
						if(!empty($_POST['keyword'])) {
							$Author_LName = highlightKeywords($row['Author_LName'],$_POST['keyword']);
						}
						$Author_Initial = $row['Author_Initial'];
						if(!empty($_POST['keyword'])) {
							$Author_Initial = highlightKeywords($row['Author_Initial'],$_POST['keyword']);
						}
						?>
						<tr class="<?php if(isset($classname)) echo $classname;?>">
							<td><?php echo $Author_ID; ?></td> <!-- prints search results -->
							<td><?php echo $Author_FName; ?></td>
							<td><?php echo $Author_LName; ?></td>
							<td><?php echo $Author_Initial; ?></td>
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
