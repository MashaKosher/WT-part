<?php

$rows_num = 10;
echo "<table>\n";
$step = 256/$rows_num;
$all_color = [0,0,0];
$end_color = [255,255,255];

for ($row = 1; $row <= $rows_num; $row++){
    $color_back = strval($all_color[0])." ".strval($all_color[1])." ".strval($all_color[1]);
    $color= strval($end_color[0])." ".strval($end_color[1])." ".strval($end_color[1]);

    echo "    <tr style=\"color: rgb($color); background-color: rgb($color_back)\"><td>Строка номер $row</td></tr>\n";
    $all_color[0] += $step;
    $all_color[1] += $step;
    $all_color[2] += $step;

    $end_color[0] -= $step;
    $end_color[1] -= $step;
    $end_color[2] -= $step;

}
echo "</table>";

//php task_2.php 10