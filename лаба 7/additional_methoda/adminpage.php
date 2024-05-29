<?php

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action = "./delete.php" method="GET">
<table style ="border: 1px 0px 1px 1px solid grey;">
<tr>
    <th>  </th>
    <th style ="border: 1px solid grey;">Order id</th>
    <th style ="border: 1px solid grey;">Order num</th>
    <th style ="border: 1px solid grey;">Name </th>
    <th style ="border: 1px solid grey;">Email</th>
    <th style ="border: 1px solid grey;">Delivery type</th>
    <th style ="border: 1px solid grey;">Price</th>
    <th style ="border: 1px solid grey;">Price</th>
    <th style ="border: 1px solid grey;">Order status</th>
    <th style ="border: 1px solid grey;">Order</th>
</tr>


';


$conn = new mysqli("localhost", "debian-sys-maint", "Z5ZEGCR4WPvBdQed", "pizza");
$sql = "SELECT * FROM table1";

$counter = 0;
foreach ($conn->query($sql) as $row) {
    $num = $row["Id"];
    echo "<tr style ='border: 1px solid grey;'>;
    <td><input name = $num type = 'checkbox'></td>";
    $counter++;
    
    foreach ($row as $elem) {
       echo "<td style ='border: 1px solid grey;'>$elem</td>";
    }
    echo "</tr>";

}


echo "
</table>
<input type = 'radio' name = 'action' value = 'delete'  ><span>delete</span>
<input type = 'radio' name = 'action' value = 'modify'  ><span>modify</span>
<input type ='submit' value = 'send'>
</form>
</body>
</html>";