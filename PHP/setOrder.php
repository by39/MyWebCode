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
    $query = "select * from chat where id = '$array[$i]'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);

    echo $row['id'];
    echo $row['name'];
    echo $row['price'];
    echo $row['quant'];
}

//echo $array[0];
//echo $array[1];
?>