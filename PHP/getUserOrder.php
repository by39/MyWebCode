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

$user = $_SESSION['uname'];

$qDealId = "select * from deal where user = '$user'";
$resultDealId = mysql_query($qDealId);
$qCont = "select * from contact where user = '$user'";
$resultCont = mysql_query($qCont);

$numDeal = mysql_num_rows($resultCont);
$arrayDeal = array();

while($rowDeal = mysql_fetch_assoc($resultDealId)){
            $idDeal = $rowDeal['oid'];
            
            $arrayDeal[] = $idDeal;
}

echo "<table id='table'>
           <tr id='tr'>
              <th id='th'>Date</th>
              <th id='th'>Order</th>
              <th id='th'>Details</th>
           </tr>
    ";

if($numDeal!=0){
    while($rowCont = mysql_fetch_assoc($resultCont)){
        echo"<tr id='tr'>";
        $idCont = $rowCont['oid'];
        $dateCont = $rowCont['date'];
        $recvCont = $rowCont['reciver'];
        $phoneCont = $rowCont['phone'];
        $addCont = $rowCont['address'];
        $emailCont = $rowCont['email'];
        $payCont = $rowCont['pay'];
        $condCont = $rowCont['con'];
        $sumCont = $rowCont['sum'];

        echo "<td id='thc'>
                  $dateCont
              </td>";

        echo"<td id='thc'>";
        
        $qDeal = "select * from deal where oid = '$idCont'";
        $rDeal = mysql_query($qDeal);

        while($rowDeal = mysql_fetch_assoc($rDeal)){
            $rowId = $rowDeal['oid'];
            $rowName = $rowDeal['name'];
            $rowPrice = $rowDeal['price'];
            $rowQuant = $rowDeal['quant'];
            $rowUnit = $rowDeal['unit'];
            echo "$rowName $rowQuant $rowUnit<br>";
        }

        echo"</td>";
        echo"<td id='thc'>
                $recvCont<br>
                $phoneCont<br>
                $addCont<br>
                $emailCont<br>
                $payCont<br>
                $condCont<br>
            </td>
            </tr>";
    }
}
echo"</table>";

mysql_close();
?>