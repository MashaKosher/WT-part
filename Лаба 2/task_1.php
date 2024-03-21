<?php
foreach ($argv as $arg) {
    switch ($arg) {
        case floatval($arg) != 0:
            if (str_contains($arg, '.')){
                print "$arg - float\n";
            }else{
                print "$arg - int\n";
            }
            break;
        default:
            print "$arg - str\n";
            break;
    }

}
//php task_1.php 1 2 "deew" 6 1.0 1.5