<?php
include 'connection.php'; 
$nameErr =  $passErr = $cpassErr =  $emailErr =  $failedErr= $successErr="";
if (isset($_POST['submit'])) {
$uname=$mysqli->real_escape_string($_POST['uname']);
$pword=$mysqli->real_escape_string($_POST['pword']);
$cpword=$mysqli->real_escape_string($_POST['cpword']);
$email=$mysqli->real_escape_string($_POST['email']);


$runQuery=true;


// username validation
if(empty($uname)){
	$runQuery=false;
	$failedErr="Failed! Please try again";
    $nameErr ="*Username is required";
}elseif(strlen($uname)< 8){
	$runQuery=false;
	$failedErr="Failed! Please try again";
    $nameErr = "*Username must contain at least 8 characters";
   
}else{
    $userchecker = $mysqli->query("SELECT fld_uid FROM tbl_login WHERE fld_username ='$uname'");
    if($userchecker->num_rows >0){
		$runQuery=false;
		$failedErr="Failed! Please try again";
        $nameErr="*Username is already used";
       
    }
    $uname = strtolower($uname);
}

// password validation
if($pword !== $cpword){ 
    $runQuery=false; 
    $failedErr="Failed! Please try again";
    $cpassErr="*Your password do not match";
}
if(empty($pword)){
    $runQuery=false;
    $passErr ="*Password is required";
    $failedErr="Failed! Please try again";
}elseif(strlen($email)< 8){
    $runQuery=false;
    $failedErr="Failed! Please try again";
    $passErr = "*Password must contain at least 8 characters";
}else{
    $pword = sha1($pword);
}


// email validation

if(empty($email)){
    $runQuery=false;
    $emailErr ="*Email is required";
    $failedErr="Failed! Please try again";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
    $runQuery=false; 
    $emailErr = "*Invalid email format";  
    $failedErr="Failed! Please try again";
}else{
    $emailchecker = $mysqli->query("SELECT fld_uid FROM tbl_login WHERE fld_useremail='$email'");
    if($emailchecker->num_rows >0){
        $runQuery=false;
        $emailErr="*Email is already used";
        $failedErr="Failed! Please try again";
    }
}


$sqlQuery="INSERT INTO tbl_login
	(fld_username
	, fld_password
	, fld_useremail) 
VALUES 
	('$uname'
	,'$pword'
	,'$email')";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$successErr="Success";
	}
}
// header("Location: register.php?result=$$failedErr");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  type="text/css" href="register.css">
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
		<h1>Register</h1>
			<p>Please fill in this form to create an account.</p>
			<hr>
		<label for="uname">-<span class = "error"> <?php echo "$nameErr"; ?></label>
		<input type="text" name="uname" placeholder="Username" required>
		<label for="uname">-<span class = "error"> <?php echo "$emailErr"; ?></label>
		<input type="text" name="email" placeholder="Email" required>
		<label for="uname">-<span class = "error"><?php echo "$passErr"; ?></label>
		<input type="password" name="pword" placeholder="Password" required>
		<label for="uname">-<span class = "error"><?php echo "$cpassErr"; ?></label>
		<input type="password" name="cpword" placeholder="Comfirm Password" required>
		<button type="submit" name="submit">REGISTER</button>
		<label>-
		<span class="success">
			<?php
					echo " $failedErr$successErr" ;
			?>
			</span>
			</label>
		</form>
	</div>
	<div class="member">
	<p>
		Already Registered? <a class="login" href="login.php">Login Here</a>
	</p>
	</div>

</div>

</body>
</html>