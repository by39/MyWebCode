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

$name = $_POST["name"];
$price = $_POST["price"];
$quant=$_POST["quant"];
$unit = $_POST["unit"];
$total = $_POST["total"];
$user = $_SESSION['uname'];
//$id=0;

$query_check = "select * from market.chat";
$result_check = mysql_query($query_check);
$orderArray = array();

while($row_check = mysql_fetch_assoc($result_check)){
    //echo $row_check['id'];
    $orderArray[]=$row_check['id'];
    //array_push($ordetArray, $row_check);
}

$id = max($orderArray)+1;

$query = "INSERT INTO `market`.`chat` (`id`, `user`, `name`, `price`, `quant`, `unit`, `total`) VALUES 
          ('$id', '$user', '$name', '$price', '$quant', '$unit', '$total');";

mysql_query($query);

mysql_close();

echo "Done!";
?>