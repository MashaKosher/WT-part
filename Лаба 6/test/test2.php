<?php

$hl = $_COOKIE["login"];
$hp = $_COOKIE["password"];

$login = "user";
$pass = "password";



if (password_verify($login,$hl) and password_verify($pass,$hp)) {
    echo "hsbbdhsbhdbshbds";
}else{
    echo "хуй";
}
// echo 
// var_dump(boolval(password_verify($log,$hp)));