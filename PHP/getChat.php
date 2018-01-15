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

$user = $_SESSION['uname'];

$query = "select * from chat where user = '$user'";
$result = mysql_query($query);
//$test_row = mysql_fetch_assoc($result);
echo "<table id='table'>
        <tr id='tr'>
           <th id='th'></th>
           <th id='th'>Name</th>
           <th id='th'>Price</th>
           <th id='th'>Quantity</th>
           <th id='th'>Unit</th>
           <th id='th'>Total</th>
        </tr>";
while($test_row = mysql_fetch_assoc($result)){
    $id=$test_row['id'];
    $name = $test_row['name'];
    $price=$test_row['price'];
    $quant=$test_row['quant'];
    $unit=$test_row['unit'];
    $total=$test_row['total'];
    echo"<tr id='tr'>
          <th id='thc'><input id='checkB' name= 'chat' type='checkbox' value=".$id."></th>
          <th id='thn'>".$name."</th>
          <th id='thp'>".$price."</th>
          <th id='thq'><input type='number' name='quantity' id = 'quant' min='1' max='50' value=".$quant."></th>
          <th id='thu'>".$unit."</th>
          <th id='tht'>".$total."</th>
          </tr>";

}
echo "</tabel>";

echo  "<input type='button' value='Update All Changes' onclick='updateChat()'><br>
       <input type='button' value='Order' onclick='setOrder()'><br>
       <input type='button' value='Remove' onclick='removeChat()'>";
//echo $_SESSION['uname'];
mysql_close();
?>