<?php
$oldFile = $_POST['old'];
$newFile = $_POST['new'];
$oldPath = 'files/' . $oldFile;
$newPath = 'files/' . $newFile;
echo $newPath;

if (file_exists($oldPath)) {
    if(is_dir($newPath)){
        echo "<h1>Да</h1>";
        rename($oldPath, $newPath.$_POST['old']);
        echo "<h1>$oldPath</h1>";
        echo $newPath.$_POST['old'];


    }else{
        echo "<h1>Нет</h1>>";

        rename($oldPath, $newPath);

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Простой файловый менеджер</title>
</head>
<body>
    <a href="main.php">Обратно</a>
</body>
</html>

