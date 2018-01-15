<?php
     $serverName=$_SERVER['HTTP_HOST'];
	 
     if($serverName=="localhost"){
     	
	     $sql_server="localhost";
		 
	     $sql_uname="root";
		 
	     $sql_pwd="10591557";
		 
	     $sql_name="market";
     }
	 
	 $conn=mysql_connect($sql_server, $sql_uname, $sql_pwd);
	 
	 if ($conn == FALSE){
	 	
	     die("Error connecting to mysql server :" . mysqli_connect_error());
		 
	 }
	 
	 $database=mysql_select_db($sql_name);
?>