<?php
$arr = $_COOKIE;
// foreach ($_COOKIE as $key => $value) {
//     setcookie($key,"", time() -3600);
// }

$temp = json_decode($arr["info"]);
foreach ($temp as $key => $value) {
    echo $key."<br>";
    var_dump($value);
    echo "<br>";

    echo "<hr>";

}
// var_dump($temp);
