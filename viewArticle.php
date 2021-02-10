<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
	session_start();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  type="text/css" href="viewArticle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" 
	crossorigin="anonymous" />
	<title>View-Article</title>
</head>
<body>
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
<div class="return">
<h2><a href="home.php"> <i class="fas fa-arrow-alt-circle-left"></i>RETURN</a></h2>
</div>
<?php
$sqlWhere = 1;
if (isset($_GET['id'])) {
	$bid = $mysqli->real_escape_string($_GET['id']);

	$sqlWhere = "fld_bid = ".$bid;
}

$sqlSelect = "SELECT 
	fld_bid
	, fld_btitle
	, fld_bcontent AS 'content'
	, fld_bpict
	, fld_bdate
	, fld_username
	, tbl_blog.fld_uid
FROM tbl_blog
JOIN tbl_login
ON tbl_blog.fld_uid = tbl_login.fld_uid
WHERE $sqlWhere LIMIT 0,1";

$result = $mysqli->query($sqlSelect);

$row = $result->fetch_assoc();

echo "<div class='post'>
<img src='blogPics/".$row['fld_bpict']."' align='right'/>
<h2>".$row['fld_btitle']."</h2><br/>
<h4>Posted by: ".$row['fld_username']."</h4><br/>
<p>".$row['content']."</p><br/>";
if (isset($_SESSION['account']) && $_SESSION['account'] == 'editor' && $_SESSION['id'] == $row['fld_uid']) {
	echo "<a href='updateArticle.php?id=".$row['fld_bid']."'>Edit</a> &nbsp";
	echo "<a href='deleteArticle.php?id=".$row['fld_bid']."'>Delete</a>";
}
echo "</div>";
?>
<!-- Comment Section -->
<div class="comment">
<h2>Comments</h2>
</div>

<?php 
echo "<div class='addcomment'>";
echo "<a href='newComment.php?id=".$row['fld_bid']."'><i class='fas fa-plus'>New Comment</i></a><br/>";
echo "<div/>";
?>


<?php

if (isset($_GET['id'])) {
	$sqlComments = "SELECT * FROM tbl_feedback WHERE fld_bid='$bid'";
	$result2 = $mysqli->query($sqlComments);
	echo "<div class='white'>";
	while ($row2 = $result2->fetch_assoc()) {
		
		echo "<hr/>";
		echo "<h4>".$row2['fld_username']."</h4>";
		echo "<p>".$row2['fld_feedback']."</p><br/>";
		
		if (isset($_SESSION['id']) &&  $_SESSION['id'] == $row2['fld_uid']) {
			echo "<a href='upComment.php?id=".$row2['fld_bid']."&fid=".$row2['fld_fid']."'>Edit</a> &nbsp";
			echo "<a href='delComment.php?id=".$row2['fld_bid']."&fid=".$row2['fld_fid']."'>Delete</a>";
			
		}
		
	}

	echo "<div/>";
}

?>
<?php
if (isset($_GET['result'])) {
	echo "<h3>".$_GET['result']."</h3>";
}
?>



</body>
</html>