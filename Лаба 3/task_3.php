<?php
$arr = explode(' ',$_POST[0]);
$arr_2 = explode(' ',$_POST[1]);
$fin_arr = [];
$arr_test = [];
foreach ($arr as $elem){
    $fin_arr[] = (int)$elem;
    $arr_test[] = (int)$elem;
}

foreach ($arr_2 as $elem){
    $temp = (int)$elem;
    $flag = true;
    foreach ($arr_test as $item){
        if ($temp == $item){
            $flag =false;
        }
    }
    if($flag){
        $fin_arr[] = $temp;
    }
}
var_dump($fin_arr);
