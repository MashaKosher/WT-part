<?php

$get_arr = explode(' ', $_GET[0]);
$str1 = "";
foreach ($get_arr as $elem) {
    $str1 .= $elem . " ";
}
$index = 1;
for ($i = 0; $i < mb_strlen($str1); $i++) {
    if ($index == 3 && $str1[$i] != ' ') {
        echo "<span style='color: violet' >$str1[$i]</span>";
        $index = 1;
    } elseif ($str1[$i] != ' ') {
        echo "<span>$str1[$i]</span>";
        $index += 1;
    }else{
        echo "<span>$str1[$i]</span>";
    }
}