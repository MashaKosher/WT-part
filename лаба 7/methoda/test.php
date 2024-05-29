<?php

$text = "email@gmail.com";
$text1 = "emailgmail.com";
$text2 = "email@gmailcom";
$text3 = "saakvaleri@gmail.com";

$pattern = '/\b\S+@\S+\.\S+\b/';


// preg_match_all($pattern, $text2, $matches);
// var_dump($matches);
echo(preg_match_all($pattern, $text2, $matches))."\n";
var_dump($matches);
echo(preg_match_all($pattern, $text, $matches))."\n";
var_dump($matches);
echo(preg_match_all($pattern, $text1, $matches))."\n";
var_dump($matches);
echo(preg_match_all($pattern, $text3, $matches))."\n";
var_dump($matches);

