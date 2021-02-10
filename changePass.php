<?php
include 'connection.php'; 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

$oldErr =  $passErr = $cpassErr = $failedErr= $successErr="";
if (isset($_POST['submit'])) {
	$oldPass = $mysqli->real_escape_string($_POST['oldPass']);
	$newPass1 = $mysqli->real_escape_string($_POST['newPass1']);
	$newPass2 = $mysqli->real_escape_string($_POST['newPass2']);
	$uid=$mysqli->real_escape_string($_SESSION['id']);


$runQuery=true;




if (empty($oldPass) 
|| (strlen(trim($oldPass)) < 8)) {
$runQuery=false;
$oldErr.="Password not valid<br/>";
} else {
$oldPass = sha1($oldPass);
}

if ($newPass1 != $newPass2) {
$runQuery=false;
$cpassErr.="Password is not identical<br/>";
}

if (empty($newPass1) 
|| (strlen(trim($newPass1)) < 8)) {
$runQuery=false;
$passErr.="Password not valid<br/>";
} else {
$newPass1 = sha1($newPass1);
}


//magiging update query
$sqlQuery="UPDATE tbl_login
SET fld_password = '$newPass1'
WHERE 
fld_uid = '$uid'
AND fld_password = '$oldPass'";


if ($runQuery) {
$result = $mysqli->query($sqlQuery);
if ($result) {
	$successErr="Success";
} else {
	$failedErr.="Failed";
}
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  type="text/css" href="changePass.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" 
	crossorigin="anonymous" />

	<title></title>
</head>
<body>

<div class="return">
<h2><a href="dashboard.php"> <i class="fas fa-arrow-alt-circle-left"></i>RETURN</a></h2>
</div>

<div class="register-page">
	<div class="form-container">
		<form action="" method="POST">
		<h1>Password</h1>
			<p>Please fill in this form to change password.</p>
			<hr>
		<label for="oldPass">-<span class = "error"> <?php echo "$oldErr"; ?></label>
		<input type="password" name="oldPass" placeholder="Old Password" required>
		<label for="newPass1">-<span class = "error"><?php echo "$passErr"; ?></label>
		<input type="password" name="newPass1" placeholder="New Password" required>
		<label for="newPass2">-<span class = "error"><?php echo "$cpassErr"; ?></label>
		<input type="password" name="newPass2" placeholder="Comfirm Password" required>
		<button type="submit" name="submit">Change</button>
		<label>-
		<span class="success">
			<?php
					echo " $failedErr$successErr" ;
			?>
			</span>
			</label>
		</form>
	</div>
</div>

</body>
</html>