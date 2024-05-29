<?php
$emailmatches = array();
$flag =  true;
$pattern = '/\b\S+@\S+\.\S+\b/u';
$failes = array();


foreach($_GET as $key=>$value){
    if ($key == "label"){
        $label = $value;
    }elseif($key == "text"){
        $text = $value;
    }else{
        if (preg_match_all($pattern, $value, $matches) == 0){
            $flag = false;
            $failes[] = $value;
        }else{
            $emailmatches[] = $value;
        }
        
    }
}


if (!$flag){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <h3> Некорректны следующие адреса: </h3>
    <ul>
    ';
    foreach($failes as $key=>$value){
        echo "<li>$value</li>";
    }
    echo "
    </ul>
    </body>
    </html>
    ";

}else{
    foreach($emailmatches as $key=>$value){
        $header = "From: mashakosher@gmail.com\r\nReply-To: $value\r\n X-Mailer: PHP/".phpversion();

        mail($value, $label, $text, $header);
    }

    echo "Письма успешно отправлены";
}






