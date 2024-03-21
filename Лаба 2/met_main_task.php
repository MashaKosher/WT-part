<?php
$site = "met_main_task.php";
$method = "get";
$l_type = 'text';
$l_name = "login";
$args = [0, 1, 2, 3, 4];
$arr = [];
$color = 'Red';
var_dump($_GET);
$get_str_flag = false;
if (count($_GET) != 0) {
    $get_str = $_GET["login"];
    echo "<<<<<$get_str>>>>";
    $get_str_flag = true;
    $arr = explode(",", $_GET["login"]);
    var_dump($arr);
}


echo "
<html>
<head>
    <title>Ведите элементы</title>
</head>
<body>
<form action=$site method=$method>";

foreach ($args as $arg) {
    $flag = False;
    foreach ($arr as $check_elem) {
        if ($check_elem == $arg) {
            $flag = True;
        }
    }
    if($get_str_flag){
        $adress_with_params = "$site?login=$get_str,$arg";
    }else{
        $adress_with_params = "$site?login=$arg";
    }
    echo "[[[$adress_with_params]]]";

    if ($flag) {
        echo "    <div><a style='background-color: $color' href='$adress_with_params'>$arg</a></div>";
    } else {
        echo "    <div><a href='$adress_with_params'>$arg</a></div>";
    }
}


echo "
</form>
</body>
</html> ";


