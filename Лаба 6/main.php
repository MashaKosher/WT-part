<?php
// var_dump($_POST);


if (isset($_POST["remember"])) {
    setcookie("login", $_POST["login"]);
    setcookie("password", $_POST["password"]);
}
