<?php
   //sart session firstly
   session_start();
   //reset the session, set it to initial status
   //unset($_SESSION['login_session']);
   // remove all session variables
   session_unset(); 

   // destroy the session 
   session_destroy(); 
   //jump to the home page
   header('Location:./Home.html');
?>