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

//$fruit = $_POST['sort'];

$name = $_POST['name'];

$query = "select * from products where name = '$name'";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
//$test_row = mysql_fetch_assoc($result);
echo "<p>".$row['name']."$".$row['price']. "/".$row['unit']."</p>";
echo"<br>";
echo"<p><input type='number' name='quantity' id = 'quant' min='1' max='50'>".$row['unit']."</p>";
echo"<input type = 'button' id='orderButton' value = 'Save' onclick='saveOrder(".'"'.$row['name'].'"'.",".'"'.$row['price'].'"'.",".'"'.$row['unit'].'"'.")'>";
?>