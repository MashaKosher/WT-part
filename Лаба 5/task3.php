<?php

$max_arr_len = 1;
$arr_new = array();


class ArrConvert{
    function __construct($arr){
        global $max_arr_len, $arr_new;
        $max_arr_len = 1;
        $arr_new = array();
        self::arr_count($arr, $max_arr_len);
        print("Размерность массива $max_arr_len\nМассив:\n");
        var_dump($arr_new);
    }

    function arr_count($ar, $len){
        foreach($ar as $elem){
            if (is_array($elem)){
                $len +=1;
                global $max_arr_len;
                if ($len > $max_arr_len){
                    $max_arr_len = $len;
                }
                self::arr_count($elem, $len);
    
            }else{
                global $arr_new;
                if (!in_array($elem, $arr_new)){
                    $arr_new[] = $elem;
                }
                
            }
        }
    }
}

$arr = [ [1,2],
          [[10, 4], 5, 6],
          [3,4,4]];

$a = new ArrConvert($arr);

