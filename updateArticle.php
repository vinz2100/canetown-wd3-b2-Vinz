<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['id']) && $_SESSION['account'] != "editor") {
	header("Location: home.php");
} elseif (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  type="text/css" href="updateArticle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
	crossorigin="anonymous" />
	<title>Document</title>
</head>
<body>
<!-- navbar -->
<nav>
	<ul>
		<li>
			<?php
			echo "<a href='dashboard.php'>Dashboard</a>"; 
			?>
		</li>
    </ul>
        <h3 style="color: white;">vinz</h3>
        <a href="home.php"><img src="blogPics/maxresdefault.png" alt="LOGO" style="height: 50px; width:50px;"></a>
        <span>Blog</span>
    <ul>
        <li>
			<?php
			echo "<a href='logout.php'>logout</a>";
			?>
        </li>
    </ul>
</nav>
<!-- navbar end -->

<!-- post update query -->
<?php
if (isset($_GET['id'])) {
	$bid = $mysqli->real_escape_string($_GET['id']);
	$uid = $mysqli->real_escape_string($_SESSION['id']);

	$sqlCount = "SELECT COUNT(*) FROM tbl_blog WHERE fld_bid = '$bid' && fld_uid = '$uid'";

	$resultC = $mysqli->query($sqlCount);

	$rowC = $resultC->fetch_row();

	if ($rowC[0] == 1) {
		$sqlQuery = "SELECT * FROM tbl_blog WHERE fld_bid = '$bid' && fld_uid = '$uid' LIMIT 0,1";
		
		$result = $mysqli->query($sqlQuery);

		$row = $result->fetch_array();
	}
}
?>
<!-- post update query end -->

<!-- post update form -->
<div class="post">
<form action="updateArticleCode.php" method="post" enctype="multipart/form-data">
	Title:<br>
	<textarea name="title" cols="80" rows="3" required>
<?php
	if (isset($_GET['id']) && $rowC[0] == 1) {
		echo $row['fld_btitle'];
	}
?>
	</textarea><br/> 

	Content:<br/>
	<textarea name="content" cols="80" rows="8">
<?php
	if (isset($_GET['id']) && $rowC[0] == 1) {
		echo $row['fld_bcontent'];
	}
?></textarea><br/>

	Previous Picture: <br>
	<img src="blogPics/<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bpict'];
}
	?>" style="height:200px; width:300px;"><br/>

	Upload a new image?
	<select name="newImage">
		<option selected>NO</option>
		<option>YES</option>
	</select><br/>
	Select image to upload:<br/>
	<input type="file" name="fileToUpload" id="fileToUpload"><br/>
	<input type="hidden" name="bid" value="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bid'];
}
	?>">
	<input type="hidden" name="prevPic" value="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bpict'];
}
	?>"><br>
	<input type="submit" value="Update" name="submit">
	<button><a href="home.php">Cancel</a></button>
</form>
</div>
<!-- post update form end -->
</body>
</html>