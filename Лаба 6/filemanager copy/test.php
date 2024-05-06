<?php

if(isset($_COOKIE['Login'])  and isset($_COOKIE['Password'])){
    $login = $_COOKIE['Login'];
    $password = $_COOKIE['Password'];
    $check_box_val = "checked";
}else{
    $login = "";
    $password = "";
    $check_box_val = '';
}
echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Простой файловый менеджер</title>
</head>
<body>
<h1>Файловый менеджер</h1>
<h2> Введите логин и пароль</h2>

<form action="./main.php" method="post" enctype="multipart/form-data">';
echo "
    <input type=\"text\" name=\"login\" value=$login>
    <br>
    <input type=\"text\" name=\"password\" value=$password >
    <br>
    <input type=\"checkbox\" name = \"remember\" $check_box_val><span>Запомнить меня?</span>
    <br>
    <input type=\"submit\" name=\"Отправить\"> 
";

echo '</form>
</body>
</html>';





