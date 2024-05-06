<?php

$log = "user";
$pass = "password"; 


$hlog = password_hash($log,PASSWORD_ARGON2I);
$hpas = password_hash($pass,PASSWORD_ARGON2I);
// var_dump(boolval(password_verify($log,$hp)));

setcookie("login", $hlog);
setcookie("password", $hpas);
