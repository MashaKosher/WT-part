<?php

$uniq_arr = [];
$arr = [[1, 23, 15, 6],
    [52, 4, 3, 1, 10],
    [10, 25]];
$arr_len = count($arr);
for($j = 0; $j < $arr_len; $j++){
    $sub_arr_len = count($arr[$j]);
    for ($i = 0; $i < $sub_arr_len; $i++){
        $flag  = True;

        foreach ($uniq_arr as $uniq_elem){
            if ($uniq_elem == $arr[$j][$i]){

                $flag = False;

            }
        }
        if ($flag){
            $uniq_arr[] = $arr[$j][$i];
        }else{
            unset($arr[$j][$i]);
        }

    }
}

foreach ($arr as $sub_arr) {
    foreach ($sub_arr as $elem) {
        echo "$elem ";
    }
    echo "\n";
}

