<?php
$main_template = file_get_contents("templates/test.html");

$stylesheet = "styles/style.css";
$company_name = "MiraIndustries";
$email_address =  "MiraIndustries@gmail.com";
$telephone_number = "+375292811311";
$about_company = "Компания ОАО MiraIndustries была онсована в 2022 году группой профессиональных разработчиков. Она занимается созданием и проектированием высоконагруженных сеерверов, бэком и фронтом и полным сопровожденеим вашего сайта ";
$news1 = "Из компании ушел ведущий TeamLead...";
$news2 = "Компания ищет новых сотрудников...";
$link_to_second = "./index2.html";

$main_template= str_replace("{stylesheet}", $stylesheet, $main_template);


// new
$str1 = "dddd {FILE=test_header.html} hhhh";
$str = "abc {FILE=./asa/nnn}";

$pattern = '/\SFILE=(\S*\b\S+\S\b)\S/';
$replacement = '$2ABCD';

$str1 = preg_replace($pattern, $replacement, $str, PREG_PATTERN_ORDER);
$str1 =  preg_replace($pattern, $replacement, $str1, PREG_PATTERN_ORDER);
//


// хедер ищем и вставляем
$pattern = '/\SFILE=(\S*\b\S+\S\b)\S/';
preg_match_all($pattern, $main_template, $arr);
$main_template = str_replace( $arr[0][0], file_get_contents($arr[1][0]), $main_template);
// хедер ищем и вставляем


// хуйня из хедера

$pattern_test = '/\SIF\s\S\w*\S\s\S*\s\S\w*\S\S\s+\w+\s+\SELSE\S\s+\w+\s+\SENDIF\S/';
preg_match_all($pattern_test, $main_template, $test_arr);
$str = $test_arr[0][0];

$pattern1 = '/\SIF\s\S(\w*)\S\s(\S*)\s\S(\w*)\S\S/';
$replacement = '$1*';
preg_match_all($pattern1, $str, $arr1);

$pattern2 = '/\SIF\s\S\w*\S\s\S*\s\S\w*\S\S\s+(\w+)\s+/';
preg_match_all($pattern2, $str, $arr2);
$write = $arr2[1][0];

$pattern3 = '/\SIF\s\S\w*\S\s\S*\s\S\w*\S\S\s+\w+\s+\SELSE\S\s+(\w+)\s+/';
preg_match_all($pattern3, $str, $arr3);
$wrong = $arr3[1][0];


if($arr1[2][0] == "=="){
    if (intval($arr1[1][0]) == intval($arr1[3][0])) {
        $name = $write;
    }else{
        $name = $wrong;
    }
}elseif ($arr1[2][0] == ">"){
    if (intval($arr1[1][0]) > intval($arr1[3][0])) {
        $name = $write;
    }else{
        $name = $wrong;
    }
}

$main_template = str_replace( '{'.$str."}", $name, $main_template);


// /regexp


$main_template = str_replace("{test_main}", file_get_contents('templates/test_main.html'), $main_template);
$main_template = str_replace("{about_company}", $about_company, $main_template);
$main_template = str_replace("{news1}", $news1 , $main_template);
$main_template = str_replace("{news2}", $news2 , $main_template);
$main_template = str_replace("{link_to_second}", $link_to_second , $main_template);




$main_template = str_replace("{test_footer}", file_get_contents('templates/test_footer.html'), $main_template);
$main_template = str_replace("{email_address}", $email_address, $main_template);
$main_template = str_replace("{telephone_number}", $telephone_number, $main_template);


echo $main_template;
//>>> замена других параметров
