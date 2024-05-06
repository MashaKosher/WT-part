<?php

echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<h2> Введите логин и пароль</h2>

<form action="./password_checker.php" method="post" enctype="multipart/form-data">
    <input type="text" name="new_login">
    <br>
    <input type="text" name="new_password">
    <br>
    <input type="submit" name="Отправить"> 
</form>
</body>
</html>';
