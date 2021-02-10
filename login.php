<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include 'connection.php'; 
$nameErr =  $passErr =   $failedErr= "";

$headerLoc = "login.php?login=invalid username or password";

if (isset($_POST['submit'])) {
	$uname=$mysqli->real_escape_string($_POST['uname']);
	$pword=$mysqli->real_escape_string($_POST['pword']);
	$acttype=$mysqli->real_escape_string($_POST['acttype']);

	if(empty($uname)){
		$runQuery=false;
		$failedErr="Failed! Please try again";
		$nameErr ="*Username is required";
	}
	if(empty($uname)){
		$runQuery=false;
		$failedErr="Failed! Please try again";
		$nameErr ="*Username is required";
	}

	$pword = sha1($pword);

	$sqlQuery = "SELECT COUNT(*), fld_uid, fld_act_type FROM tbl_login WHERE fld_username='$uname' AND fld_password='$pword' AND fld_act_type = '$acttype' LIMIT 0,1";
	$result = $mysqli->query($sqlQuery);
	$row = $result->fetch_array();
	
	if ($row[0] == 1) {
		$_SESSION['id'] = $row[1];
		$_SESSION['uname'] = $uname;
		$_SESSION['account'] = $row[2];
		$headerLoc = "home.php";
	}

	header("Location: $headerLoc");
	

	
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  type="text/css" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" 
	crossorigin="anonymous" />
	<title></title>
</head>
<body>

<div class="return">
<h2><a href="index.php"> <i class="fas fa-arrow-alt-circle-left"></i>RETURN</a></h2>
</div>

<div class="register-page">
	<div class="form-container">
		<form action="" method="POST">
		<h1>LOG IN</h1>
			<hr>
		<label for="uname" class="lerror">-<span class = "error">
		<?php
		if (isset($_GET['login'])) {
			$failedErr= "Failed!";
			echo $_GET['login'];
		}
		?> 
		<?php echo "$nameErr"; ?></label>
		<input type="text" id="content" name="uname" placeholder="Username" required style="width: 100%;">
		<label for="uname">-<span class = "error"><?php echo "$passErr"; ?></label>
		<input type="password" name="pword" placeholder="Password" required style="width: 100%;">
		<br><br>
		<label class="account">Account Type : </label>
		<input type="radio" id="reader" name="acttype" value="reader" checked>
		<label class="account">Reader</label>
		<input type="radio" id="editor" name="acttype" value="editor">
		<label class="account">Editor</label>
		<button type="submit" name="submit">LOGIN</button>
		<label>-
		<span class="success">
			<?php
					echo " $failedErr" ;
			?>
			</span>
			</label>
		</form>
	</div>
	<div class="member">
	<p>
		Not registered? <a class="login" href="Register.php">Create an account</a>
	</p>
	</div>

</div>
</body>
</html>
