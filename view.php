<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
 #tbl{
     margin: auto;
     width: 100%;
 }
 table, th, td{
     border: 1px solid black;
     border-collapse: collapse;
 }
 #tage{
     text-align: center;
 }
 #id{
    text-align: center;
 }
 th{
  background-color: black;
  color: white;
}
#update{
    width: 50px;
    text-align: center;
}
#delete{
    width: 50px;
    text-align: center;
}

 </style>

</head>
<body>
<table id="tbl">
<thead>
    <tr>
    <th>Emp_ID</th>
    <th>Enp_Name</th>
    <th>Emp_Age</th>
    <th>Position</th>
    <th>Salary</th>
    <th id="update" ></th>
    <th id="delete"></th>
    
    </tr>
</thead>
<tbody>
<?php
    include "connection.php";
    $sqlSelect = "SELECT * FROM `tblemployee`";
    $result = $mysqli->query($sqlSelect);
    while ($row = $result->fetch_assoc()) {
        
    echo "<tr>";
    
    echo "<td id='id'>".$row['Emp_ID']."</td>";
    echo "<td>".$row['Emp_Name']."</td>";
    echo "<td id='tage'>".$row['Emp_Age']."</td>";
    echo "<td>".$row['Position']."</td>";
    echo "<td>".$row['Salary']."</td>";
    echo "<td id='update'><a href='update.php?id="
    .$row['Emp_ID']
    ."'>Update</a></td>";
    echo "<td id='delete'><a href='delete.php?id="
    .$row['Emp_ID']
    ."'>Delete</a></td>";
    echo "</tr>";
    }
?>
</tbody>
</table>
<button><a href="record.php">Back</a></button>
</body>
</html>