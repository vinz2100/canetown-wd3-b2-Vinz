<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Calculator</h1>
<form action="" method="GET">
    <input type="text" name="txt1"><br><br>
    <input type="text" name="txt2"><br><br>
    <Select name=selection>
        <option value="+">ADD</option>
        <option value="-">SUBTRATION</option>
        <option value="*">MULTIPLICATION</option>
        <option value="/">DIVISION</option>
    </Select>
    <button type="submit" name="submit">=</button>
</form>
<?php
if (isset($_GET['submit'])) {
    if (is_numeric($_GET['txt1'])) {
        $n1=$_GET['txt1'];
    if (is_numeric($_GET['txt2'])) {
		$n2 = $_GET['txt2'];
$op= $_GET['selection'];
$result="";

switch ($op) {
	case '+':
		$result = $n1 + $n2;
		break;
	case '-':
		$result = $n1 - $n2;
		break;
	case '*':
		$result = $n1 * $n2;
		break;
	case '/':
		$result = $n1 / $n2;
		break;
	default:
		# code...
		break;
}
}
echo "$n1 $op $n2 = $result";
}}   
?>
</body>
</html>