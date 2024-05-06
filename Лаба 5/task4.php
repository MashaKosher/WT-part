<?php

class WordsCount{
    const RUS_LETTERS = array(
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 
        'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
    );


    // const ENG_LETTERS = array(
    //     'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
    //     's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
    // );


    function __construct($str){
        $arr = array();
        $i = 0;
        while ($i < mb_strlen($str)){
            $temp = mb_substr($str, $i, 1);
            if (array_key_exists($temp, $arr)){
                $arr[$temp] +=1;

            }else{
                $arr[$temp] = 1;

            }
            $i +=1;
        }

        var_dump($arr);

    }
}


$str = "аааооо р т ф н";

$a = new WordsCount($str);

