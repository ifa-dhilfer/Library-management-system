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
			$queryCondition .= "Subject_ID LIKE '%" . $wordsAry[$i] . "%' OR 
			Bk_Num LIKE '%" . $wordsAry[$i] . "%'";
			if($i!=$wordsCount-1) {
				$queryCondition .= " OR ";
			}
		}
	}
	$orderby = " ORDER BY Subject_ID"; 
	$sql = "SELECT * FROM booksubject " . $queryCondition;
	$result = mysqli_query($db_conn,$sql);	

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
				<li><a href="searchbook.php" class="tablinks">Title</a></li>
				<li><a href="searchauthor.php" class="tablinks">Author</a></li>
				<li class="active"><a href="searchsubject.php" class="tablinks">Subject</a></li>
				<li><a href="help.php" class="tablinks">Help</a></li>
			</ul>
    		<!-- Search form -->
			<form name="frmSearch" method="post" action=""> 	
				<div class="search-box">
					<div>
						<input placeholder="Search Book Subject..." type="text" name="keyword" class="InputBox" value="<?php echo $keyword; ?>"	/>
						<input type="submit" name="go" class="btnSearch" value="Search">
					</div>
				</div>
				</form>	
			<table id="table" style="margin-left: 0">
				<tr> 
				<!-- table headings -->
					<th>Subject ID</th>
					<th>Book Number</th>
				</tr>
			<?php 
				$i=0;
				while($row = mysqli_fetch_assoc($result)) { 

				if($i%2==0)
					$classname="evenRow";
				else
					$classname="oddRow";
				
				$Subject_ID = $row["Subject_ID"];
				if(!empty($_POST['keyword'])) {
					$Subject_ID = highlightKeywords($row['Subject_ID'],$_POST['keyword']);
				}
				$Bk_Num = $row['Bk_Num'];
				if(!empty($_POST['keyword'])) {
					$Bk_Num = highlightKeywords($row['Bk_Num'],$_POST['keyword']);
				}
				?>
				<tr class="<?php if(isset($classname)) echo $classname;?>">
					<td><?php echo $Subject_ID; ?></td> <!-- prints search results -->
					<td><?php echo $Bk_Num; ?></td>
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


