<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<?php
    include "connection.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $mysqli->real_escape_string($_POST['name']);
    $age = $mysqli->real_escape_string($_POST['age']);
    $position = $mysqli->real_escape_string($_POST['position']);
    $salary = $mysqli->real_escape_string($_POST['salary']);
    
    
    $sqlInsert = "INSERT INTO
    tblemployee
    (Emp_Name
    ,Emp_Age
    ,Position
    ,Salary)
    VALUES
    ('$name'
    ,'$age'
    ,'$position'
    ,'$salary')";

    if ($mysqli->query($sqlInsert)) {
    echo "Record Success";
    } else {
    echo "Record Failed";
    }
    }
?>
<style>
table{
    border: 1px solid black;
    margin: auto;
    margin-top: 100px;
    padding: 20px;
}
</style>
</head>
<body>
<a href="programs.php">Back</a>
<table>
<form action="" method="POST">
    <tr>
    <th>Name:</th>
    <td><input type="text" name="name" required></td>
    </tr>
    <tr>
    <th>Age:</th>
    <td><input type="text" name="age" required><br></td>
    </tr>
    <tr>
    <th>Position:</th>
    <td><input type="text" name="position" required><br></td>
    </tr>
    <tr>
    <th>Salary:</th>
    <td><input type="text" name="salary" required><br></td>
    </tr>
    <th colspan="2"><input type="submit" name="submit" value="Record"><button><a href="view.php">view</a></button></th>
</form>
</table>
</body>
</html>