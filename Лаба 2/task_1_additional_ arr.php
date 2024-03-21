<?php
$login = !empty($_GET['login']) ? $_GET['login'] : 'Параметры не переданы!';
if ($login != 'Параметры не переданы!'){
    foreach ($_GET as $arg) {
        $arg = explode(' ',$arg);
        foreach ($arg as $a){
            switch ($a) {
                case floatval($a) != 0:
                    if (str_contains($a, '.')) {
                        echo "\n$a - float; \n";
                    } else {
                        echo "\n$a - int; \n";
                    }
                    break;
                default:
                    echo "\n$a - str; \n";
                    break;
            }
        }
    }
}
