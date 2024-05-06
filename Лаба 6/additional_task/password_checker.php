<?php

var_dump($_POST);


$flag = false;
$income_login = $_POST['new_login'];
$income_password = $_POST['new_password'];

$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "Additional");
$sql = "SELECT * FROM Users";

foreach($conn->query($sql) as $row){
    var_dump($row);

    if ($income_login==$row['Login'] and $income_password==$row['Password']){
        $flag = true;
        break;
    }
    
}

if ($flag) {
    echo "<h1>Такой пользователь уже есть</h1>";
}else{
    $sql = "INSERT INTO `Users` (`Id`, `Login`, `Password`, `Type`) VALUES (NULL, '$income_login', '$income_password', 'User');";
    if($conn->query($sql)){
        echo "<h1>Пользователь успешно зарегестрирван</h1>";

    }else{
        echo 'Произогла ошикба';
    }
    
}