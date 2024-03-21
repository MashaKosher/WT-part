<?php
$fruits = array("Apple", "Banana", "Orange", "Cherry", "Ab");

$max = $fruits[0];

$flag = True;

while ($flag) {
    $flag = false;
    for ($i = 1; $i < count($fruits); $i++) {
        if ($fruits[$i] < $fruits[$i - 1]) {
            $temp = $fruits[$i];
            $fruits[$i] = $fruits[$i - 1];
            $fruits[$i - 1] = $temp;
            $flag = true;
        }
    }
}
var_dump($fruits);