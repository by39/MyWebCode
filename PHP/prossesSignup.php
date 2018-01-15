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

$uname = $_POST["uname"];
$pwd = $_POST["pwd"];
$rpwd = $_POST["rpwd"];

$subu = $_POST["subu"];
$city = $_POST["city"];
$age = $_POST["age"];
$gender = $_POST["gender"];

$query = "select * from market.users";
$result = mysql_query($query);

$existUser = array();
while($test_row = mysql_fetch_assoc($result)){
    $existUser[] = $test_row['id'];
}

if (in_array($uname, $existUser)){
  //$boo = FALSE;
  echo "fail";
  //echo "Match found";
}
else{
    $num = max($existUser)+1;
    
    if($uname != "" && $pwd!="" && $rpwd != "" && $pwd == $rpwd){
        $add = "INSERT INTO `market`.`users` (`id` ,`uname` ,`pwd` ,`age` ,`sub` ,`city` ,`gender`)
                VALUES ('$num', '$uname', '$pwd', '$age', '$subu', '$city', '$gender');";
        mysql_query($add);
        
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['uname'] = $uname;
        mysql_close();
        echo $_SESSION['uname'];
    }else{
       //s $boo = FALSE;
        echo "fail";
    }
}
?>