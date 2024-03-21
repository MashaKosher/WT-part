<?php

$rows_num = 10;
echo "<table>\n";
for ($row = 1; $row <= $rows_num; $row++){
    if ($row%2==0){
        echo "    <tr style=\"background-color: white; color: black\"><td>Строка номер $row</td></tr>\n";
    } else{
        echo "    <tr style=\"background-color: black; color: white\"><td>Строка номер $row</td></tr>\n";
    }

}
echo "</table>";

//php task_2.php 10

