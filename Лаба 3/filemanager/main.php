<!DOCTYPE html>
<html>
<head>
    <title>Простой файловый менеджер</title>
</head>
<body>
<h1>Файловый менеджер</h1>

<h2>Список файлов:</h2>
<ul>
    <?php
    $directory = './files/';
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo '<li>';
            echo $file;
            if (pathinfo($directory . $file, PATHINFO_EXTENSION) == 'txt') {
                $content = file_get_contents($directory . $file);
                echo ' - ' . substr($content, 0, 30) . '...';
            }
            echo '</li>';
        }
    }
    ?>
</ul>

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
</html>
