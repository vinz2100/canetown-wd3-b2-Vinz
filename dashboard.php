<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  type="text/css" href="dashboard.css">
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
			echo "<a href='changePass.php'>Change Password</a>"; 
			?>
		</li>
    </ul>
        <h3 style="color: white;">vinz</h3>
        <a href="home.php"><img src="blogPics/maxresdefault.png" alt="LOGO" style="width: 50px;
    height: 50px;"></a>
        <span>Blog</span>
    <ul>
        <li>
			<?php
			echo "<a href='logout.php'>logout</a>";
			?>
        </li>
    </ul>
</nav>
<?php
if (isset($_GET['result'])) {
	echo "<h1>".$_GET['result']."</h1>";
}

$subStrCharLimit = 80;
$uid = $mysqli->real_escape_string($_SESSION['id']);
if ($_SESSION['account'] == "editor") {
	echo "<h1>Articles Written</h1>";
	echo "<table border='1'>
	<tr>
		<th>Title</th>
		<th>Picture</th>
		<th colspan='4'>Content</th>
	</tr>";

	$sqlGetArticle="SELECT 
			fld_bid
			, fld_btitle
			, SUBSTR(fld_bcontent, 1, $subStrCharLimit) AS 'content'
			, fld_bpict
			, fld_bdate
	 	FROM tbl_blog WHERE fld_uid='$uid'
	 	ORDER BY fld_bid DESC";
	$resultGetArticle = $mysqli->query($sqlGetArticle);
	while ($row = $resultGetArticle->fetch_assoc()) {
		echo "<tr>";
		echo "<td rowspan='2' width='400px'>".$row['fld_btitle']."</td>";
		echo "<th rowspan='2' width='80px'><img src='blogPics/".$row['fld_bpict']."' height='85' width='85'/></th>";
		echo "<td colspan='4' height='100px'>".$row['content']." ...</td>";
		echo "</tr>";
		echo "<tr>";
		
		echo "<th width='110px'><a href='viewArticle.php?id=".$row['fld_bid']."'>View Article</a></th>";
		echo "<th width='70px'><a href='updateArticle.php?id=".$row['fld_bid']."'>Edit</a></th>";
		echo "<th width='70px'><a href='deleteArticle.php?id=".$row['fld_bid']."'>Delete</a></th>";
		echo "</tr>";
		
	}

	echo "</table>";
}
?>
<?php
echo "<h1>Comments Written</h1>";
echo "<table border='1'>
<tr>
	<th>Blog Title</th>
	<th colspan='2'>Comment</th>
</tr>";

$subStrCharLimit = 100;
$uid = $mysqli->real_escape_string($_SESSION['id']);
$sqlGetFeedback="SELECT 
		fld_fid
		,tbl_blog.fld_bid
		,tbl_blog.fld_btitle
		, fld_feedback 
	FROM tbl_feedback 
	JOIN tbl_blog 
	ON tbl_feedback.fld_bid = tbl_blog.fld_bid
	WHERE tbl_feedback.fld_uid = '$uid'
	ORDER BY fld_fid DESC";
$resultGetFeedback = $mysqli->query($sqlGetFeedback);
while ($rowGetFeedback = $resultGetFeedback->fetch_assoc()) {
	echo "<tr>";
	echo "<td rowspan='4'>".$rowGetFeedback['fld_btitle']."</td>";
	echo "<td rowspan='4' width='200px'>".$rowGetFeedback['fld_feedback']."</td>";
	echo "<tr>";
	echo "<th width='110px'><a href='viewArticle.php?id=".$rowGetFeedback['fld_bid']."'>View Article</a></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th  width='70px'><a href='upComment.php?id=".$rowGetFeedback['fld_bid']
		."&fid=".$rowGetFeedback['fld_fid']."'>Edit</a></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th  width='70px'><a href='delComment.php?id=".$rowGetFeedback['fld_bid']
		."&fid=".$rowGetFeedback['fld_fid']."'>Delete</a></th>";
	echo "</tr>";
}

echo "</table>";
?>
</body>
</html>