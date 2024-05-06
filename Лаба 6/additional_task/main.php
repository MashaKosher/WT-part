<?php

// var_dump($_POST);


$flag = false;
$type = "User";
$income_login = $_POST['login'];
$income_password = $_POST['password'];

$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "Additional");
$sql = "SELECT * FROM Users";

foreach($conn->query($sql) as $row){
    if ($income_login==$row['Login'] and $income_password==$row['Password']){
        $flag = true;
        $type = $row['Type'];
        if (isset($_POST["alien"])){
            setcookie("login", $_POST["login"], time()+3600);
            setcookie("password", $_POST["password"], time()+3600);
        }
        else{
            if (isset($_POST["remember"])) {
                setcookie("login", $_POST["login"]);
                setcookie("password", $_POST["password"]);
            }
        }
        
        break;
    }
    
}


if ($flag){
    if ($type=="Admin"){
        echo '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        
        <body>
        <h1>Админская страница</h1>
        <h2>Список пользователей</h2>
        <hr>
        <form  action="./admin.php" method="post" enctype="multipart/form-data">
        <table>';

        foreach($conn->query($sql) as $row){
            echo "<tr>";
            $temp = $row['Id'];
            echo "<th><input type = 'checkbox' name = $temp></th>";
            foreach($row as $elem){
                echo "<th>$elem</th>";
            }
            echo "</tr>";

        }

        echo '</table>

        <hr>
        <div><span>Удалить</span><input type="radio" name="action" value="delete"> </div>
        <div><span>Редактировать</span><input type="radio" name="action" value="modify"> </div>
        <input type="submit" value="Отправить">
        </form>
        </body>
        </html>';
    
    }else{
        echo '
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./style.css">
        
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        
            <title>Document</title>
        </head>
        
        <body>
            <section class="main">
                <header>
                    <p>MiraIndustries</p>
                    <input type="text" placeholder="Поиск по сайту...">
                </header>
                <section class="content_block">
                    <div class="menu">
                        <p>Меню</p>
                        <a href="./index2.html">Регистрация</a>
                        <a href="#">Каталог товаров</a>
                        <a href="#">Новости</a>
                    </div>
                    <div class="text">
                        <div class="main_part">
                            <p class="about">О компании </p>
                            <p class="info-about">Компания ОАО MiraIndustries была онсована в 2022 году группой профессиональных
                                разработчиков. Она занимается созданием и проектированием высоконагруженных сеерверов, бэком и
                                фронтом и полным сопровожденеим вашего сайта </p>
                        </div>
                        <!-- <div class="banners">
                            Банеры
                        </div> -->
                    </div>
        
                    <div class="third-block">
                        <div class="news">
                            <p>Новости</p>
                            <div>
                                <p>Из компании ушел ведущий TeamLead...</p>
                                <a href="#">Читать</a>
                            </div>
                            <div>
                                <p>Компания ищет новых сотрудников...</p>
                                <a href="#">Читать</a>
                            </div>
                        </div>
        
                        <div>
                            <form class="question" action="form_recieve.php" method="post">
                                <p>Хотели бы вы у нас работать?</p>
                                <div><span>Да</span><input type="radio" name="color" value="red"> </div>
                                <div><span>Нет</span><input type="radio" name="color" value="red"> </div>
                                <input сlass="question_button" type="submit" value="Отправить">
                            </form>
                        </div>
        
                    </div>
        
                </section>
                <footer>
                    <p class="footer_header">Контакты для связи</p>
                    <p class="footer_info">Email: MiraIndustries@gmail.com</p>
                    <p class="footer_info">Мобильный телефон: +375292811311</p>
                </footer>
        
            </section>
        </body>
        
        </html>';
    }
    
}else{
    echo "Неправильно введенный пароль";
}


