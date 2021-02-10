<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" 
	crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
<nav>
<ul>
    
    <li><?php
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
    <p class="add"><?php
    if (isset($_SESSION['account'])){
	    if ($_SESSION['account'] == "editor") {
            echo "<a href='newArticle.php'><i class='fas fa-plus-circle'>Create New Article</i></a>";
        }
    } else {
        header("location:index.php");
    } 
    ?></p>

<?php

$subStrCharLimit = 250;
$sqlSelect = "SELECT 
	fld_bid
	, fld_btitle
	, SUBSTR(fld_bcontent, 1, $subStrCharLimit) AS 'content'
	, fld_bpict
	, fld_bdate
	, fld_username
	, tbl_blog.fld_uid
FROM tbl_blog
JOIN tbl_login
ON tbl_blog.fld_uid = tbl_login.fld_uid;";

$result = $mysqli->query($sqlSelect);

while ($row = $result->fetch_assoc()) {
    echo "<div class='post'>
    
	<img src='blogPics/".$row['fld_bpict']."' align='right'/>
	<h2>".$row['fld_btitle']."</h2><br/>
	<h4>Posted by: ".$row['fld_username']."</h4><br/>
    <p>".$row['content']." <b>...</b></p><br/>";
    echo "<a href='viewArticle.php?id=".$row['fld_bid']."'>View Article</a> &nbsp";
    if (isset($_SESSION['account']) && $_SESSION['account'] == 'editor' && $_SESSION['id'] == $row['fld_uid']) {
		echo "<a href='updateArticle.php?id=".$row['fld_bid']."'>Edit</a> &nbsp ";
		echo "<a href='deleteArticle.php?id=".$row['fld_bid']."'>Delete</a> &nbsp";
	}
	

	echo "</div>";
}
?>
<?php
if (isset($_GET['result'])) {
	echo $_GET['result'];
}
?>
 
</body>
</html>