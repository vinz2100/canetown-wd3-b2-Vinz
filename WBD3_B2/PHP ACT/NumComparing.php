<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
    <h3>Finding the largest number</h3>
    <input type="text" name="txt1"><br><br>
    <input type="text" name="txt2"><br><br>
    <input type="text" name="txt3"><br><br>
	<button type="submit" name="submit">Send</button>
</form>
<?php
if (isset($_GET['submit'])) {
    if (is_numeric($_GET['txt1'])) {
        $num1=$_GET['txt1'];
    if (is_numeric($_GET['txt2'])) {
		$num2 = $_GET['txt2'];
    if (is_numeric($_GET['txt3'])) {
		$num3 = $_GET['txt3'];
    $largest=0;
    
if ($num1 > $num2) {
	$largest = $num1;
} else {
	$largest = $num2;
}

if ($largest < $num3) {
	$largest = $num3;
}

}
echo "The largest number is $largest";
}}}
// code below will work
// if ($num1 > $num2) {
// 	if ($num1 > $num3) {
// 		$largest = $num1;
// 	} else {
// 		$largest = $num3;
// 	}
// } else {
// 	if ($num2 > $num3) {
// 		$largest = $num2;
// 	} else {
// 		$largest = $num3;
// 	}
// }


?>
</body>
</html>