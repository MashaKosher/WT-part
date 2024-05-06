<?php
$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "test");



if ($conn->connect_error) {
    die("Connection failed". $conn->connect_error);
}else{
    print_r($conn->host_info."\n");
    print_r("Current mysql version: ".$conn->server_info."\n");
}

$q = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";


if ($conn->query($q)) {
    print("Кодировка установлена успешно \n");
}else{
    print("Ошибка $conn->error \n");
}


$sql1 = "SELECT * FROM anime";
$sql2 = "SELECT * FROM anime_score_list";

if($result = $conn->query($sql1)){
    foreach($result as $row){
        var_dump($row);
    }
}

if($result = $conn->query($sql2)){
    foreach($result as $row){
        var_dump($row);
    }
}


echo "Отсортированная таблица\n";
$sql3 = "SELECT * FROM `anime` ORDER BY `Просмотренных эпизодов`";
if($result = $conn->query($sql3)){
    foreach($result as $row){
        var_dump($row);
    }
}



$conn->close();