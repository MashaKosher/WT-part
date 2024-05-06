<?php

$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "test");

$sql = "SHOW TABLES FROM `test`";
$res = $conn->query($sql);


// создаем массив таблиц
$tables = array();
while ($table = mysqli_fetch_array($res)){
    $tables[] = $table[0];
}
var_dump($tables);


// пробегаемеся по всем таблицам 
$index = 1;
foreach ($tables as $table){
    $sql = "SELECT * FROM $table";
    $res = $conn->query($sql); // знчаения из таблицы 
    echo "\nТаблица $table номер $index: \n";

    $sql1 = "SHOW FIELDS FROM $table";
    $res1 = $conn->query($sql1); // возможнеы поля таблицы


    // создаем массивы типов ключей и полей
    $type_arr = array(); 
    $key_type_arr = array();
    foreach ($res1 as $row){
        $type_arr[] = $row["Type"];
        if  ($row["Key"] != ''){
            $key_type_arr[] = $row["Key"].' : ';
        }else{
            $key_type_arr[] = $row["Key"];

        }
    }
    echo "\n";
    
    // выводим 
    foreach ($res as $row){
        $i = 0;
        foreach ($row as $key => $value){
            echo sprintf('%s[%s%s]: %s | ', $key, $key_type_arr[$i] ,$type_arr[$i],$value);
            $i++;
        }
        echo "\n";
    }
    $index++;

}