<?php
    $str_1 = $argv[1];
    $acc = 0;
    for ($i = 0; $i <= strlen($str_1); $i++){
        $acc += intval($str_1[$i]);
    }

    print "Сумма строки: $acc\n";
//php task_4.php 14567
