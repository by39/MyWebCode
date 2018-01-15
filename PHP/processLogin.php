<?php //check the errors
ini_set("error_reporting", E_ALL);
ini_set("log_errors", "1");
ini_set("error_log", "php_errors.txt");
?>

<?php
//call the initialiseand set variables
require_once ("reset.php");
//require_once ("data.php");
?>

<?php
require_once("data.php");

$uname = $_POST["uname"];
$pwd = $_POST["pwd"];

$query = "select * from market.users where uname = '$uname' and pwd = '$pwd'";
$result = mysql_query($query);


//$num = mysql_num_rows($result);

$row = mysql_fetch_assoc($result);
$num = $row['id'];

if($num != 0){
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['uname'] = $uname;
    mysql_close();
    echo $num;
}
else{
    echo $num;
}
//echo $num;
?>

