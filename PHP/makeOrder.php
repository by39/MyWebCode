<?php //check the errors
ini_set("error_reporting", E_ALL);
ini_set("log_errors", "1");
ini_set("error_log", "php_errors.txt");
?>
<?php
//call the initialise and set variables
require_once ("reset.php");
require_once ("data.php");
?>
<?php 
require_once("data.php");

$arrayj=$_POST['idArray'];
$array=json_decode($arrayj);

$date=$_POST['date'];
$reciver=$_POST['reciver'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$email=$_POST['email'];
$pay=$_POST['pay'];
$con=$_POST['con'];
$sum=$_POST['sum'];

$arraychat = array();
$arrayorder = array();

$query = "select * from deal";
$result = mysql_query($query);

while($row=mysql_fetch_assoc($result)){
    $arraychat[] = $row['oid'];
}
//echo count($arraychat);
for($i=0; $i<count($arraychat); $i++){
    if(!in_array($arraychat[$i],$arrayorder)){
        $arrayorder[]=$arraychat[$i];
    }
}
//echo count($arrayorder);
$newid = max($arrayorder)+1;

for($i=0;$i<count($array);$i++){
    $chatid = $array[$i];

    $query = "select * from chat where id = '$array[$i]'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);

    $cid = $row['id'];
    $user = $row['user'];
    $name = $row['name'];
    $price = $row['price'];
    $quant = $row['quant'];
    $unit = $row['unit'];
    $total = $row['total'];

    $orderQuery = "INSERT INTO `market`.`deal` (`oid`, `user`, `name`, `price`, `quant`, `unit`, `total`) 
                   VALUES ('$newid', '$user', '$name', '$price', '$quant', '$unit', '$total');";
    mysql_query($orderQuery);

    $chatQuery = "DELETE FROM `market`.`chat` WHERE `chat`.
                 `id` = '$cid' AND `chat`.`user` = '$user' 
                AND `chat`.`name` = '$name' AND `chat`.`price` = '$price' 
                AND `chat`.`quant` = '$quant' AND `chat`.`unit` = '$unit' 
                AND `chat`.`total` = '$total';";
    mysql_query($chatQuery);
}
$contactQuery = "INSERT INTO `market`.`contact` (`oid`, `user`,`date`, `reciver`, `phone`, `address`, `email`, `pay`, `con`, `sum`) 
                     VALUES ('$newid', '$user' ,'$date', '$reciver', '$phone', '$address', '$email', '$pay', '$con', '$sum');";
mysql_query($contactQuery);
mysql_close();
echo "Done";
?>