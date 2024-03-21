<?php
$arr = [[1, 1.246, 1.4, 'dsdsd'],
    [1.4, 4, 3, 'GhhhK', 10]];
$arr_len = count($arr);
for ($j = 0; $j < $arr_len; $j++) {
    $sub_arr_len = count($arr[$j]);
    for ($i = 0; $i < $sub_arr_len; $i++) {
        if (is_float($arr[$j][$i])) {
            $arr[$j][$i] = round($arr[$j][$i], 2);
        } elseif (is_int($arr[$j][$i])) {
            $arr[$j][$i] = $arr[$j][$i] * 2;
        } elseif (is_string($arr[$j][$i])) {

            $arr[$j][$i] = mb_strtoupper($arr[$j][$i]);
            echo "dsdsds --- $arr[$j][$i]\n";
        }
    }
}

foreach ($arr as $sub_arr) {
    foreach ($sub_arr as $elem) {
        echo "$elem ";
    }
    echo "\n";
}