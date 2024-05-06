<?php



$flag = false;
$income_login = $_POST['login'];
$income_password = $_POST['password'];

$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "WebsiteUsers");
$sql = "SELECT * FROM Users";

foreach($conn->query($sql) as $row){
    // var_dump($row);
    // echo $row['Login'].$row['Password']."\n";
    // var_dump($row["Login"]==$income_login);
    // var_dump($row["Password"]==$income_password);
    // var_dump(true and true);
    if (($income_login==$row['Login'] and $income_password==$row['Password']) or (password_verify($row['Login'],$income_login) and password_verify($row['Password'],$income_password) )){
        $flag = true;
        if (isset($_POST["remember"])) {
            $log =  $_POST["login"];
            $pass =  $_POST["password"];
            $hlog = password_hash($log,PASSWORD_ARGON2I);
            $hpas = password_hash($pass,PASSWORD_ARGON2I);
            setcookie("Login", $hlog );
            setcookie("Password", $hpas);
        }
        
        break;
    }
    
}

if ($flag){
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Простой файловый менеджер</title>
    </head>
    <body>
    <h1>Файловый менеджер</h1>
    
    <h2>Список файлов:</h2>
    <ul>';
    
    
    $directory = './files/';
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo '<li>';
            echo $file;
            if ( pathinfo($directory . $file, PATHINFO_EXTENSION) == 'txt' or pathinfo($directory . $file, PATHINFO_EXTENSION) == 'docx' ) {
                $content = file_get_contents($directory . $file);
                echo ' - ' . substr($content, 0, 30) . '...';
            }else{
                echo "<div style=\"min-height:100px; min-width: 100px\"> <img src=./files/$file></div>";
            }
            echo '</li>';
        }
    }
    
    echo '</ul>
    <h2>Добавить новый файл:</h2>
    <form action="./upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Загрузить">
    </form>
    
    <h2>Удалить файл:</h2>
    <form action="./delete.php" method="post">
        <input type="file" name="file">
        <input type="submit" value="Удалить">
    </form>
    
    <h2>Переместить файл:</h2>
    <form action="./move.php" method="post">
        <input type="file" name="old">
        <input type="text" name="new">
        <input type="submit" value="Удалить">
    </form>
    </body>
    </html>';
}else{
    echo 'Неверный логин и пароль';
}



