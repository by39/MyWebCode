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

$arrayj=$_POST['goods'];
$array=json_decode($arrayj);

for($i=0;$i<count($array);$i++){
    $query = "DELETE FROM `market`.`chat` WHERE `chat`.`id` = '$array[$i]';";
    mysql_query($query);
}
mysql_close();

echo "The selected products are deleted!!"
?>