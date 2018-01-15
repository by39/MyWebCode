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

$arrayid = array();
//$arrayPr = array();
$sum = 0;
echo " <table id='table'>
        <tr id='tr'>
           <th id='th'>code</th>
           <th id='th'>Name</th>
           <th id='th'>Price</th>
           <th id='th'>Quantity</th>
           <th id='th'>Unit</th>
           <th id='th'>Total</th>
        </tr>";


for($i=0;$i<count($array);$i++){
    $query = "select * from chat where id = '$array[$i]'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);

    $id = $row['id'];
    $user = $row['user'];
    $name = $row['name'];
    $price = $row['price'];
    $quant = $row['quant'];
    $unit = $row['unit'];
    $total = $row['total'];

    $arrayid[] = $id;
    $sum += $total;
    echo"<tr id='trv'>
          <th id='thc'>".$id."</th>
          <th id='thn'>".$name."</th>
          <th id='thp'>".$price."</th>
          <th id='thq'>".$quant."</th>
          <th id='thu'>".$unit."</th>
          <th id='tht'>".$total."</th>
        </tr>";
}
echo "<tr id='tr'>
         <th id='tht'>Sum due</th>
         <th colspan='5' id='ths'>".$sum."</th>
      </tr>
      </table><br>

      <label>Reciever Name:</lable> <input type='text' id='nameText'><br>
      <label>Phone Number:</lable> <input type='text' id='phoneText'><br>
      <label>Postal Address:</lable> <textarea id='addrText'></textarea><br>
      <label>E-mail Address:</lable> <input type='text' id='emailText'><br>
      <label>Payment Detail:</lable> <input type='radio' id='on' name='pay' value='on'>Pay online <input type='radio' id='off' name='pay' value='off'>Pay on delivery or in shop<br>
      <label>Delivery Detail:</label> <input type='radio' id='dev' name='delv' value='del'>Delivery <input type='radio' id='pick' name='delv' value='pick'>Pick Up<br>

      <input type='button' value='Confrim Order' onclick='confOrder()'><br>";
//echo $arrayOr[0][0];
//echo $array[0];
//echo $array[1];
?>