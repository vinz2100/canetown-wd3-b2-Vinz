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
// delete query
$target_dir = "blogPics/";
if (isset($_POST['submit'])) {
	$bid = $mysqli->real_escape_string($_POST['bid']);
	$prevPic = $mysqli->real_escape_string($_POST['prevPic']);
	$uid = $mysqli->real_escape_string($_SESSION['id']);

	$sqlQuery = "DELETE FROM tbl_blog 
		WHERE fld_bid = '$bid' && fld_uid = '$uid'";
		
	$result = $mysqli->query($sqlQuery);
	if ($result) {

		unlink($target_dir.$prevPic);
	} else {
		$resultMessage="Delete Failed";
	}
	
	header("Location: home.php?result=$resultMessage");
}
// delete querry end
?>
<!-- data calling query post -->
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
<!-- data calling query post end-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet"  type="text/css" href="deleteArticle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
	crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Document</title>
</head>
<body>
<!-- navbar -->
<nav>

<ul>
    <li>
		<?php
		if (isset($_SESSION['account'])){
		echo "<a href='dashboard.php'>Dashboard</a>";
		} else {
			header("location:index.php");
		} 
   		?>
    </li>
</ul>
    <h3 style="color: white;">vinz</h3>
    <a href="home.php"><img src="blogPics/maxresdefault.png" alt="LOGO"></a>
    <span>Blog</span>
<ul>
    <li>
        <?php
			if (isset($_SESSION['account'])){
				echo "<a href='logout.php'>logout</a>";
			} else {
				header("location:index.php");
			} 
		?>
    </li>
</ul>
</nav>
<!-- navbar end -->

<!-- post -->
<div class='post'>
<h1><center>DELETE POST</center></h1>
<img src="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $target_dir.$row['fld_bpict'];
}
?>" align="right">
Title:<b><br>
<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_btitle'];
}
?>
</b><br/><br>
Content:<br/>
<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bcontent'];
}
?>
<br/>
<br/>
<form action="" method="POST">
<input type="hidden" name="bid" value="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bid'];
}
?>">
<input type="hidden" name="prevPic" value="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bpict'];
}
?>">
<input type="submit" value="DELETE" name="submit">
<button><a href="home.php">Cancel</a></button>
</form>
</div>
<!-- post end -->
</body>
</html>