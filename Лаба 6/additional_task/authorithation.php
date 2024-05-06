<?php

if(isset($_COOKIE['login_a'])  and isset($_COOKIE['password_a'])){
    $login = $_COOKIE['login_a'];
    $password = $_COOKIE['password_a'];
    $remember_val = "checked";
    $alien_val = "checked";
}else{
    $login = "";
    $password = "";
    $remember_val = "";
    $alien_val = "";
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
    <input type=\"checkbox\" name = \"remember\" $remember_val><span>Запомнить меня?</span>
    <br>
    <input type=\"checkbox\" name = \"alien\" $alien_val><span>Чужой компьютер?</span>
    <br>
    <a href=\"./registration.php\"> Регистрация</a>
    <br>
    <input type=\"submit\" name=\"Отправить\"> 
";

echo '

</form>
</body>
</html>';





