<?php
$file = $_POST['file'];
$filePath = './files/' . $file;
echo './files/'.$file;
if (file_exists($filePath)) {
    unlink($filePath);
}?>
<!DOCTYPE html>
<html>
<head>
    <title>Простой файловый менеджер</title>
</head>
<body>
    <a href="main.php">Обратно</a>
</body>
</html>

//header("Location: ./main.php");
