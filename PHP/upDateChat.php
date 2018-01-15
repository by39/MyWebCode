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

$idJ=$_POST['idArrayJ'];
$arrayid=json_decode($idJ);

$quantJ=$_POST['quantArrayJ'];
$arrayquant = json_decode($quantJ);

$idLength = count($arrayid);
$quantLength= count($arrayquant);

if($idLength == $quantLength){
    for($i=0;$i<$idLength;$i++){
        $querySearch = "SELECT * FROM chat WHERE id = '$arrayid[$i]'";
        $result = mysql_query($querySearch);
        $row = mysql_fetch_assoc($result);

        $price = $row['price'];
        $total = $price * $arrayquant[$i];

        $queryupdate = "UPDATE `market`.`chat` SET `quant` = '$arrayquant[$i]',
                        `total` = '$total' WHERE `chat`.`id` = '$arrayid[$i]' LIMIT 1;";
        mysql_query($queryupdate);
    }
    echo "You have updated your all products in the chat!";
}
else{
    echo "There are some problems are facing!";
}

mysql_close();
?>