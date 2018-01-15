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

$fro = $_POST['sort'];

$query = "select * from products where sort = '$fro'";
$result = mysql_query($query);
//$test_row = mysql_fetch_assoc($result);
while($test_row = mysql_fetch_assoc($result)){
    $name = $test_row['name'];
    echo"<div id = 'goods' onclick='showDetail(".'"'.$name.'"'.")'>";
    echo"<p >".$test_row['name']."</p>";
    echo"<p>"."$".$test_row['price']. "/".$test_row['unit']."</p>";
    echo"</div>";
    echo"<br>";
}
?>