<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="programs.php">Back</a>
    <form action="" method="GET">
    NumA<input type="text" name="txt1">
    NumB<input type="text" name="txt2">
        <button type="submit" name="submit">Compare</button>
    </form>
<?php 
if(isset($_GET['submit'])){
    if(is_numeric($_GET['txt1'])){
        $numA = $_GET ['txt1'];
   
    if(is_numeric($_GET['txt2'])){
        $numB = $_GET ['txt2'];
   



if ($numA > $numB) {
    echo " $numA is larger than $numB " ;
}elseif ($numA == $numB){
    echo " Both number is the same " ;
}else{
    echo " $numA is smaller than $numB " ;
}
}}
}
?>
</body>
</html>