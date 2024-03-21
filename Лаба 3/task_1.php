<?php
$get_arr = explode(' ', $_GET[0]);
$arr = [];
foreach ($get_arr as $elem) {
    $flag = true;
    foreach ($arr as $equal) {
        if ($equal == $elem){
            $flag = false;
        }

    }
    if ($flag) {
        $arr[] = $elem;
    }
}

sort($arr);
var_dump($arr);