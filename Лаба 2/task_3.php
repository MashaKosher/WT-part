<?php
$arr = [[0,0,0,0,0], [1,1,1,1,1], [2,2,2,2,2], [3,3,3,3,3], [4,4,4,4,4], [5,5,5,5,5]];
$colors = ['red', 'green', 'blue', 'yellow', 'brown', 'violet'];
$index = 0;
foreach ($arr as $elem){
    $str1 = implode(',', $elem);
    echo "<div style=\"color:$colors[$index];\">$str1</div>\n";
    $index +=1;
}