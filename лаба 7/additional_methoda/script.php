<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/css/style2.css">
</head>
<body>
    <div>';
$order_num = rand(0,2000);
echo "<h1>Ваш заказ #$order_num</h1>
<ul>";
    

$email = $_GET["email"];
$address = $_GET["address"];
$name = $_GET["name"];
$delivery = $_GET["delivery-type"] == "pickup" ? "Самовывоз" : "Курьер" ;
$counter = 0;
$order_list = array();
$order_sum = 0;
$order_to_db_str = '';

foreach($_GET as $key=>$value){
    if($counter < 4){
        $counter++;
    }else{
        $order = explode(";", $key);
        $pizza_name = $order[0];
        $pizza_amount = $order[1];
        $price = explode("_",$order[2]);
        $price = floatval(implode(".", $price));
        $order_sum += $price;
        $order_list[]= [$pizza_name, $pizza_amount, $price];
        $order_to_db_str .= $pizza_name.'-'.$pizza_amount.'-'.$price.';';

        echo "<li>Пицца $pizza_name x $pizza_amount = $price </li>";
    }
}

echo "       </ul>
<hr>
<h2>Cумма заказа: $order_sum </h2>
<h2>Имя: $name</h2>
<h2>Тип дотсавки: $delivery</h2>
<h2>Адрес дотсавки: $address</h2>
<hr>
<p>**Электронный чек с заказом отправлен на почту: $email</p>";
// </div>
// </body>
// </html>";


$subject = "Заказ #$order_num пицерии mira-industries";

$message = "
<html>
<head>
  <title>$subject</title>
</head>
<body>
  <p>Ваш заказ:</p>
  
  <table>
    <tr>
      <th>Pizza type</th><th>Amount</th><th>Month</th><th>Price</th>
    </tr>";


foreach($order_list as $elem){
    $message."
    <tr>
      <td>$elem[0]</td><td>$elem[1]</td><td>$elem[2]</td>
    </tr>
    ";
}
$message."
  </table>
</body>
</html>
";

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Дополнительные заголовки
$headers[] = "To: <$email>";
$headers[] = 'From: Mira Industries <order@example.com>';
$headers[] = 'Cc: order@example.com';
$headers[] = 'Bcc: order@example.com';


try{
    mail($email, $subject, $message, implode("\r\n", $headers));
    echo "Спасибо за заказ";

}catch(Exception $e){
    echo "$e";

}

// Отправляем


$conn = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed", "pizza");

$sql = "INSERT INTO `table1` (`Id`,`NUmOrder`,`CustomerName`, `CustomerEmail`,`DeliveryType`, `CustomerAddress`, `OrderPrice`,`OrderStatus`,`InnerOrder` ) VALUES (NULL, $order_num, '$name', '$email', '$delivery', '$address', '$order_sum','In progress', '$order_to_db_str');";

if($conn->query($sql)){
    echo "<h1>Заказ добавлен в бд</h1>";

}else{
    echo '<h1>Произошла ошикба</h1>';
}

echo '
</div>
</body>
</html>";
';