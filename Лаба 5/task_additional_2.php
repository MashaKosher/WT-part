<?php

$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "test");
$sql1 = "SELECT * FROM test1";

$value = $conn->query($sql1);

// var_dump($value);

echo "
<html>
<head>
    <title>Текст</title>
</head>
<body>
    <table border=\"1\">\n";


$style = 'style="font-size:17px; font-weight: bold"';

echo "\t<tr>
            <td $style>id</td>
            <td $style>film_name</td>
            <td $style>film_score</td>
            <td $style>Год</td>
            <td $style>Режиссёр</td>
        </tr>\n";

foreach ($value as $elem) {
    // var_dump($elem);
    $id_str = $elem["id"];
    $name_str = $elem["film_name"];
    $score_str = $elem["film_score"];
    $year_str = $elem["Год"];
    $prod_str = $elem["Режиссёр"];
    echo "\t<tr>
        <td>$id_str|</td>
        <td>$name_str</td>
        <td>$score_str</td>
        <td>$year_str</td>
        <td>$prod_str</td>
    </tr>\n";
}

echo "    </table>\n</body>\n</html>\n";