<?php
// $name = "Tom";
// $age = 36;
// setcookie("name", $name);
// setcookie("age", $age);



class InfoFormer{
    public $arr;

    const Alph = array(

        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
    
        's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
    
    );


    public function number_gen($number){
        $this->arr["number"] = [];
        for($i = 0; $i < $number; $i++){
            $this->arr["number"][] = rand(0,10000);
        }
    }


    public function string_gen($number){
        $this->arr["string"] = [];
        for($i = 0; $i < $number; $i++){
            $string_len = rand(1,20);
            $temp = '';
            for($j = 0; $j < $string_len; $j++){
                $temp .= self::Alph[rand(0, $string_len -1)];
            }
            $this->arr["string"][] = $temp;
        }
    }


    public function arr_gen($number){
        $this->arr["arr"] = [];
        for($i = 0; $i < $number; $i++){
            $this->arr["arr"][$i] = [];
            $elem_num = rand(0,10);
            for($j = 0; $j < $elem_num-1; $j++){
                $elem_type = rand(0,2);
                if ($elem_type == 0){
                    $this->arr["arr"][$i][] = [];
                }elseif($elem_type == 1){
                    $this->arr["arr"][$i][] = rand(0,10000);
                }else{
                    $this->arr["arr"][$i][] = self::Alph[rand(0, 25)];

                }
            } 

            // $string_len = rand(1,20);
            // $temp = '';
            // for($j = 0; $j < $string_len; $j++){
            //     $temp .= self::Alph[rand(0, $string_len -1)];
            // }
            // $this->arr["string"][] = $temp;
        }
    }

} 



$a  = new InfoFormer();
$a->arr_gen(5);
$a->number_gen(10);
$a->string_gen(4);

// var_dump($a->arr);

$temp = json_encode($a->arr);

// var_dump($temp);

setcookie("info", $temp);
