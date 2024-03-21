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

$main_template = str_replace("{test_header}", file_get_contents('templates/test_header.html'), $main_template);
//$main_template= str_replace("{company_name}", $company_name, $main_template);
$main_template= str_replace("{company_name}", "hfdhfjdhj", $main_template);



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
