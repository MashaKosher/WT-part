<?php


$city = $_GET["city"];
$url = "https://yandex.by/pogoda/".$city;
// $url = "https://yandex.by/pogoda/moscow";
// var_dump($url);

curl_get($url);



function curl_get($url, $refer = 'http://www.google.com'){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_REFERER, $refer);
    $data = curl_exec($ch);


    // echo 'DATA: '.$data."\n";
    // echo strlen($data);
    if(strlen($data) < 100){

        $str1  = substr($data, 22);
        echo "new url: $str1 \n";
        $new_url = "https://yandex.by".substr($data, 22);
        var_dump($new_url);

    
        // new url
        $ch1 = curl_init($new_url);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_REFERER, $refer);

        $data = curl_exec($ch1);
    }
    


    $pat = '/<span\sclass=\"temp__value temp__value_with-unit\">(\S*?)</';
    
    preg_match_all($pat, $data, $arr);
    // var_dump($arr);
    var_dump($arr[1][1]);


}