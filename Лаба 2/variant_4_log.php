<?php
$new_arr = [];

$first_arr = !empty($_GET["0"]) ? $_GET["0"] : 'Первый массив пустой';
$second_arr = !empty($_GET["1"]) ? $_GET["1"] : 'Второй массив пустой';


if ($first_arr != 'Первый массив пустой'){
    $first_arr = explode(' ', $first_arr);
    foreach ($first_arr as $elem){
        if (intval($elem) != 0) {
            $new_arr[] = (int)$elem;
        }
    }
}else{
    echo "Массив 1 пустой\n";
}


if ($second_arr != 'Второй массив пустой'){
    $second_arr = explode(' ', $second_arr);
    foreach ($second_arr as $elem){
        if (intval($elem) != 0) {
            $new_arr[] = (int)$elem;
        }
    }
}else{
    echo "Массив 2 пустой";
}

foreach ($new_arr as $elem) {
    if ($elem % 2 == 0) {
        echo "$elem \n";
    }
}

