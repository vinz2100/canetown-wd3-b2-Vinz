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
	<link rel="stylesheet"  type="text/css" href="newArticle.css">
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
        <a href="home.php"><img src="blogPics/maxresdefault.png" alt="LOGO"></a>
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

<!-- post -->
<div class="post">
<form action="newArticleCode.php" method="post" enctype="multipart/form-data">

	Title: <br> <textarea name="title" cols="80" rows="3" required></textarea><br/> 
	Content:<br/> <textarea name="content" cols="80" rows="8" required></textarea><br/>
	Select image to upload:<br/><br>
	<input type="file" name="fileToUpload" id="fileToUpload" required><br/><br/>
	<input type="submit" value="Submit" name="submit" width="20px">
	<button><a href="home.php">Discard</a></button>
</form>
<br>
<?php
if (isset($_GET['result'])) {
	echo $_GET['result'];
}
?>
</div>
<!-- post end -->
</body>
</html>