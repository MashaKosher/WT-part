<?php

$id_arr = array();

foreach($_POST as $key=> $value){
    if ($key != "action"){
        $id_arr[] = $key;
    }else{
        $action = $value;
    }
}



$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "Additional");


// var_dump($_POST);
if($action == "modify"){

    foreach($id_arr as $id){
        $sql = "UPDATE `Users` SET `Type` = 'Admin' WHERE `Id` = $id";
        if($conn->query($sql)){
            echo "Редактироование прошло успешно";
        }else{
            echo "Редактироование прошло неуспешно";

        };
    }


}else{
    foreach($id_arr as $id){
        $flag = false;
        $sql = "SELECT `Type` FROM `Users` WHERE `Id`=$id";
        foreach($conn->query($sql) as $row){
            $type = $row['Type'];
            if ($type == "User"){
                $flag = true;
            }
            var_dump($type, $flag);

        }

        if ($flag){
            $sql = "DELETE FROM `Users` WHERE `Id`=$id";
            $conn->query($sql);

        }
        // var_dump($conn->query($sql));s
    }
}

