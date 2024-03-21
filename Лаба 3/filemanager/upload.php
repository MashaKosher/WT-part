<?php
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'files/';
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);
    header("Location: main.php");
} else {
    echo 'Ошибка загрузки файла.';
}

