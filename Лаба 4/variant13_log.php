<?php
$text = "Я стану крутым программистом после БГУИРА";
$text1 = "I wiil become a ccool mer programmer adter BSUIR";
$pattern = '/\b(\w{7})(\w+)\b/u';

$text = $_GET[0];

$replacement = '$1*';
//$text1 = preg_replace($pattern, $replacement, $text1);
$text1 = preg_replace($pattern, $replacement, $text);


echo "<div><span style='font-weight: bold'>Исходный текст: </span>$text</div>";
echo "<div><span style='font-weight: bold'>Финальный текст: </span>$text1</div>";
echo "\n";
