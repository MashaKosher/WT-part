<?php

$states = ["In progress", "Done", "Delievered"];
$conn = new mysqli("localhost", "debian-sys-maint", "Z5ZEGCR4WPvBdQed", "pizza");
$id_arr = array();

foreach ($_GET as $key => $value) {
    if ($key != "action") {
        $id_arr[] = $key;
    } else {
        $action = $value;
    }
}



if($action=="modify"){
    modify($conn, $id_arr, $states);

}else{
    delete_order($conn, $id_arr);
}

// if ($action = "delete") {
//     // delete_order($conn, $id_arr);
// }else{
//     // var_dump($action);
//     modify($conn, $id_arr, $states);
//     // foreach($id_arr as $id){
//     //     $sql = "UPDATE `pizza` SET `OrderStatus` = '' WHERE `Id` = $id";
//     //     if($conn->query($sql)){
//     //         echo "Редактироование прошло успешно";
//     //     }else{
//     //         echo "Редактироование прошло неуспешно";

//     //     };
//     // }

// }

// if($action == "modify"){

    // foreach($id_arr as $id){
    //     $sql = "UPDATE `Users` SET `Type` = 'Admin' WHERE `Id` = $id";
    //     if($conn->query($sql)){
    //         echo "Редактироование прошло успешно";
    //     }else{
    //         echo "Редактироование прошло неуспешно";

    //     };
    // }


function delete_order($DB, $orders_to_delete){
    foreach($orders_to_delete as $order_id){
        $sql = "DELETE FROM `table1` WHERE `Id`=$order_id";
        $DB->query($sql);
    }
}


function modify($DB, $orders_to_modify, $status_types){

    $arr_to_delete = array();
    foreach($orders_to_modify as $elem){
        $sql =  "SELECT * FROM `table1`  WHERE `Id`=$elem";

        $res = $DB->query($sql);
        foreach($res as $value){
            $status = $value["OrderStatus"];

            if($status == $status_types[0]){
                $temp = $status_types[1];
                $sql = "UPDATE `table1` SET `OrderStatus` = '$temp' WHERE `Id` = $elem";
                $DB->query($sql);
            }elseif($status == $status_types[1]){
                $temp = $status_types[2];
                $sql = "UPDATE `table1` SET `OrderStatus` = '$temp' WHERE `Id` = $elem";
                $DB->query($sql);
            }elseif($status == $status_types[2]){
                $arr_to_delete[] = $elem;
            }

        }
    }
    if(count($arr_to_delete) > 0){
        delete_order($DB, $arr_to_delete);

    }
    // var_dump($arr_to_delete);

}